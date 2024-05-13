<?php

namespace App\Http\Controllers\Quotations;

use App\Http\Controllers\Controller;
use App\Models\Addresses\Address;
use App\Models\Images\Image;
use App\Models\Orders\Order;
use App\Models\Products\Product;
use App\Models\Quotations\Quotation;
use Illuminate\Http\Request;

use Auth;
use Mail;

class QuotationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('permissionCheck');
    }

    /**
     * Show create
     */
    public function showCreate(Request $request){

        $auid = Auth::user()->id;

        $order = Order::findOrFail((int)$request->orderID);
        $products = Product::where('statusID',1)->get();

        $pageData = array(
            'title' => "Add quotation",
            'titlePage' => "Add quotation",
        );

        return view('orders.create_quotation', compact('pageData', 'order', 'products'));
    }

    /**
     * Create
     */
    public function create(Request $request){

        $auid = Auth::user()->id;

        $order = Order::with(['customer'])->findOrFail((int)$request->orderID);

        $quotation = new Quotation();
        $quotation->orderID = $order->id;
        $quotation->customerID = $order->customerID;
        $quotation->quotedDate = date('Y-m-d H:i:s', strtotime($request->quotDate));
        $quotation->validTill = date('Y-m-d H:i:s', strtotime($request->validTill));
        $quotation->products = json_encode($request->products);
        $quotation->subTotal = (double)$request->subTotal;
        $quotation->discount = !empty($request->discount) ? $request->discount : '0';
        $quotation->delivery = (double)$request->delivery;
        $quotation->grandTotal = (double)$request->grandTotal;
        $quotation->cuid = (int)$auid;
        $quotation->uuid = (int)$auid;
        $quotation->save();

        $order->statusID = 2;
        $order->status = 'Processed';
        $order->update();

        $info = array(
            'name' => $order->customer->name
        );
        Mail::send(['text' => 'mail_customer'], $info, function ($message, $order)
        {
            $message->to($order->customer->email, $order->customer->name)
                ->subject('Quotation emailed');
            $message->from('hello@pharma.com', 'Pharma');
        });

        return response()->json(
            ['id' => $quotation->id,], 200);

    }


    /**
     * Show
     */
    public function show(Request $request){

        $quotation = Quotation::with(['customer','order'])->findOrFail((int)$request->quotationID);
        $images = Image::where('orderID',(int)$quotation->orderID)->get();

        $products = array();

        foreach (json_decode($quotation->products) as $productData){
            $product = Product::findOrFail((int)$productData->id);
            $productAr = array('id' => $productData->id, 'name' => $product->name,'sku' => $product->sku, 'memo' => $productData->memo,
                'uom' => $productData->uom, 'qty' => $productData->qty, 'unitPrice' => $productData->unitPrice, 'lineTotal' => $productData->lineTotal,);
            array_push($products,$productAr);
        }

        $pageData = array(
            'title' => "Quotation",
            'titlePage' => "Quotation",
        );

        return view('quotations.show', compact('pageData', 'quotation','images', 'products'));

    }

}
