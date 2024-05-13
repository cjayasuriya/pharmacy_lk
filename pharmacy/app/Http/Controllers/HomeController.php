<?php

namespace App\Http\Controllers;

use App\Models\Orders\Order;
use App\Models\Products\Product;
use App\Models\Quotations\Quotation;
use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = null;

        if(Auth::user()->type == 1){
            $products = Product::where('statusID',1)->get();
        }

        $auid = Auth::user()->id;

        $getMyCustomerOrders = Order::where('statusID',1)->where('cuid',$auid)->get();
        $getMyQuotations = Quotation::where('statusID',1)->where('customerID',$auid)->get();

        $pendingOrders = Order::where('statusID',1)->get();
        $allQuotations = Quotation::get();

        $pageData = array(
            'title' => "Dashboard",
            'titlePage' => "Dashboard",
        );

        return view('home',  compact('pageData', 'products', 'getMyCustomerOrders','pendingOrders', 'allQuotations','getMyQuotations'));
    }
}
