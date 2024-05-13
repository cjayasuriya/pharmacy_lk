@extends('layouts.app')

@section('content')
<div class="container">

    @if(Auth::user()->type == 2)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello {{ Auth::user()->name }}! <br><br>

                    <div class="row">
                        <div class="col-md-12">
                            <h4>My orders</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="/orders/create" class="btn btn-outline-primary">Add order</a>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered" id="orders" >
                                <thead>
                                <tr>
                                    <th style="width: 30px;" class="text-center">Order #</th>
                                    <th style="width: 30px;" class="text-center">Ordered at</th>
                                    <th style="width: 40px;" class="text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($getMyCustomerOrders as $getMyCustomerOrder)
                                    <tr>
                                        <td>
                                            <a href="/orders/{{$getMyCustomerOrder->id}}">
                                                {{ 'PHO'.$getMyCustomerOrder->id }}
                                            </a>
                                        </td>
                                        <td>{{ $getMyCustomerOrder->created_at }}</td>
                                        <td>{{ $getMyCustomerOrder->status }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>My quotations</h4>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered" id="orders" >
                                    <thead>
                                    <tr>
                                        <th style="width: 30px;" class="text-center">Quotation #</th>
                                        <th style="width: 30px;" class="text-center">Order #</th>
                                        <th style="width: 40px;" class="text-center">Customer</th>
                                        <th style="width: 40px;" class="text-center">Amount (LKR)</th>
                                        <th style="width: 40px;" class="text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getMyQuotations as $quotation)
                                        @if($quotation->statusID == 1)
                                            <tr>
                                                <td>
                                                    <a href="/quotations/{{ $quotation->id }}">
                                                        {{ 'PHQ'.$quotation->id }}
                                                    </a>
                                                </td>
                                                <td>{{ 'PHO'.$quotation->order->id }}</td>
                                                <td>{{ $quotation->customer->name }}</td>
                                                <td style="text-align: right">{{ number_format($quotation->grandTotal, 2, '.', ',') }}</td>
                                                <td>{{ $quotation->status }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                </div>
            </div>
        </div>
    </div>
    @endif

    <br>


    @if(Auth::user()->type == 1)

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            Hello {{ Auth::user()->name }}! <br><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Pending orders</h4>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered" id="orders" >
                                        <thead>
                                        <tr>
                                            <th style="width: 30px;" class="text-center">Order #</th>
                                            <th style="width: 30px;" class="text-center">Ordered at</th>
                                            <th style="width: 40px;" class="text-center">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pendingOrders as $pendingOrders)
                                            <tr>
                                                <td>
                                                    <a href="/orders/{{$pendingOrders->id}}">
                                                        {{ 'PHO'.$pendingOrders->id }}
                                                    </a>
                                                </td>
                                                <td>{{ $pendingOrders->created_at }}</td>
                                                <td>{{ $pendingOrders->status }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Pending quotations</h4>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered" id="orders" >
                                        <thead>
                                        <tr>
                                            <th style="width: 30px;" class="text-center">Quotation #</th>
                                            <th style="width: 30px;" class="text-center">Order #</th>
                                            <th style="width: 40px;" class="text-center">Customer</th>
                                            <th style="width: 40px;" class="text-center">Amount (LKR)</th>
                                            <th style="width: 40px;" class="text-center">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allQuotations as $quotation)
                                            @if($quotation->statusID == 1)
                                            <tr>
                                                <td>
                                                    <a href="/quotations/{{ $quotation->id }}">
                                                        {{ 'PHQ'.$quotation->id }}
                                                    </a>
                                                </td>
                                                <td>{{ 'PHO'.$quotation->order->id }}</td>
                                                <td>{{ $quotation->customer->name }}</td>
                                                <td style="text-align: right">{{ number_format($quotation->grandTotal, 2, '.', ',') }}</td>
                                                <td>{{ $quotation->status }}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                            <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Approved quotations</h4>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered" id="orders" >
                                            <thead>
                                            <tr>
                                                <th style="width: 30px;" class="text-center">Quotation #</th>
                                                <th style="width: 30px;" class="text-center">Order #</th>
                                                <th style="width: 40px;" class="text-center">Customer</th>
                                                <th style="width: 40px;" class="text-center">Amount (LKR)</th>
                                                <th style="width: 40px;" class="text-center">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($allQuotations as $quotation)
                                                @if($quotation->statusID == 2)
                                                    <tr>
                                                        <td>
                                                            <a href="/quotations/{{ $quotation->id }}">
                                                                {{ 'PHQ'.$quotation->id }}
                                                            </a>
                                                        </td>
                                                        <td>{{ 'PHO'.$quotation->order->id }}</td>
                                                        <td>{{ $quotation->customer->name }}</td>
                                                        <td style="text-align: right">{{ number_format($quotation->grandTotal, 2, '.', ',') }}</td>
                                                        <td>{{ $quotation->status }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Rejected quotations</h4>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered" id="orders" >
                                            <thead>
                                            <tr>
                                                <th style="width: 30px;" class="text-center">Quotation #</th>
                                                <th style="width: 30px;" class="text-center">Order #</th>
                                                <th style="width: 40px;" class="text-center">Customer</th>
                                                <th style="width: 40px;" class="text-center">Amount (LKR)</th>
                                                <th style="width: 40px;" class="text-center">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($allQuotations as $quotation)
                                                @if($quotation->statusID == 0)
                                                    <tr>
                                                        <td>
                                                            <a href="/quotations/{{ $quotation->id }}">
                                                                {{ 'PHQ'.$quotation->id }}
                                                            </a>
                                                        </td>
                                                        <td>{{ 'PHO'.$quotation->order->id }}</td>
                                                        <td>{{ $quotation->customer->name }}</td>
                                                        <td style="text-align: right">{{ number_format($quotation->grandTotal, 2, '.', ',') }}</td>
                                                        <td>{{ $quotation->status }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <a href="/products/create" class="btn btn-outline-primary">Add product</a>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered" id="products" >
                                    <thead>
                                    <tr>
                                        <th style="width: 10px;" class="text-center">SKU</th>
                                        <th style="width: 40px;" class="text-center">Name</th>
                                        <th style="width: 30px;" class="text-center">Price (LKR)</th>
                                        <th style="width: 20px;" class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->sku }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td style="text-align: right">{{ number_format(json_decode($product->prices)->selling, 2, '.', ',') }}</td>
                                            <td style="text-align: center">
                                                <a type="button" href="/products/{{$product->id}}/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                                                <a type="button" href="/products/{{$product->id}}/delete" class="btn btn-sm btn-outline-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif


</div>
@endsection
