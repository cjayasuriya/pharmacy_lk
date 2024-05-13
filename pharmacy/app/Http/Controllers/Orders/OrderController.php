<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Addresses\Address;
use App\Models\Images\Image;
use App\Models\Orders\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show product create
     */
    public function showCreate(Request $request) {

        $auid = Auth::user()->id;
        $address = Address::where('uid',$auid)->first();

        $pageData = array(
            'title' => "Add order",
            'titlePage' => "Add order",
        );

        return view('orders.create', compact('pageData', 'address'));

    }

    /**
     * Create
     */
    public function create(Request $request) {

//        $this->validate($request, [
//            'address1' => ['required', 'string', 'max:255'],
//            'address2' => ['string', 'max:255'],
//            'city' => ['required', 'string', 'max:255'],
//            'state' => ['required', 'string', 'max:255'],
//            'zip' => ['required', 'integer',],
//        ]);

        $imagesCounts = 0;

        if($request->hasfile('imageFile')) {
            foreach ($request->file('imageFile') as $file) {
                $imagesCounts++;
            }
        }

        if($imagesCounts>=6){
            echo 'Can upload 5 files in maximum. Please try agaib';
        }else{

            $auid = Auth::user()->id;

            $address = array(
                'address1' => $request->address1,
                'address2' => !empty($request->address2) ? $request->address2 : '',
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            );

            $order = new Order();
            $order->customerID = $auid;
            $order->address = json_encode($address);
            $order->deliveryDate = date('Y-m-d', strtotime($request->delivery));
            $order->timeSlot = $request->timeslot;
            $order->cuid = $auid;
            $order->uuid = $auid;
            $order->save();

            $count = 1;
            if($request->hasfile('imageFile')) {
                foreach ($request->file('imageFile') as $file) {
                    $name=$file->getClientOriginalName();
                    $extension =  '.'.$file->getClientOriginalExtension();
                    $name = date("m-d-Y-H-i-s", strtotime(now())).'_'.$count.$extension;
                    $path =  $file->move('media/orders/customers/files',$name);

                    $imageUpload = new Image();
                    $imageUpload->customerID = $auid;
                    $imageUpload->orderID = $order->id;
                    $imageUpload->name = $name;
                    $imageUpload->fileP = $path;
                    $imageUpload->save();
                    $count++;
                }
            }

        }

        return redirect()->intended('/home');

    }


    /**
     * Show
     */
    public function show(Request $request) {

        $order = Order::with(['customer'])->findOrFail((int)$request->orderID);
        $images = Image::where('orderID',(int)$request->orderID)->get();

        $pageData = array(
            'title' => "Order",
            'titlePage' => "Order",
        );

        return view('orders.show', compact('pageData', 'order','images'));

    }

}
