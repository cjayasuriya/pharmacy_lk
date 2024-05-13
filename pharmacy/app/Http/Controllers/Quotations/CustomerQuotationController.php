<?php

namespace App\Http\Controllers\Quotations;

use App\Http\Controllers\Controller;
use App\Models\Images\Image;
use App\Models\Products\Product;
use App\Models\Quotations\Quotation;
use Illuminate\Http\Request;


use Auth;

class CustomerQuotationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Change status of the quotation (Approve/Reject)
     */
    public function updateStatus(Request $request) {

        $quotation = Quotation::with(['customer','order'])->findOrFail((int)$request->quotationID);

        if($request->statusID == 2){
            $quotation->statusID = 2;
            $quotation->status = "Approved";
        }else if($request->statusID == 0){
            $quotation->statusID = 0;
            $quotation->status = "rejected";
        }

        $auid = Auth::user()->id;
        $quotation->uuid = $auid;
        $quotation->update();

        $info = array(
            'name' => $quotation->customer->name
        );
        Mail::send(['text' => 'mail_customer'], $info, function ($message, $quotation)
        {
            $message->to('hello@pharma.com', 'Pharma')
                ->subject('Quotation status updated');
            $message->from($quotation->customer->email, $quotation->customer->name);
        });

        return redirect()->intended('/home');

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
