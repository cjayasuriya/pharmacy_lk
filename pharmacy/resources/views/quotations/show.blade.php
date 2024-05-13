@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quotation - {{ 'PHQ'.$quotation->id }}</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">Customer by: {{ $quotation->customer->name }}</div>
                            <div class="col-md-3">Customer's mobile: {{ $quotation->customer->mobile }}</div>
                            <div class="col-md-6">
                                Quoted at: {{ date('d-m-Y', strtotime($quotation->quotedDate)) }} | Valid till: {{ date('d-m-Y', strtotime($quotation->validTill))}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                Delivery location:
                                {{ json_decode($quotation->order->address)->address1.', '.  json_decode($quotation->order->address)->address2. ', '. json_decode($quotation->order->address)->city.', '. json_decode($quotation->order->address)->state.', '. json_decode($quotation->order->address)->zip }}
                            </div>
                            <div class="col-md-6">
                                Delivery date and time: {{ $quotation->order->deliveryDate.' | '.$quotation->order->timeSlot }}
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12 text-end text-muted">(All the amounts are in {{ $quotation->currency }})</div>
                            <div class="col-md-12"><br></div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered" id="products">
                                    <thead>
                                    <tr>
                                        <th>DESCRIPTION</th>
                                        <th class="text-center" style="width: 130px;">QTY</th>
                                        <th class="text-end" style="width: 160px;">UNIT PRICE</th>
                                        <th class="text-end" style="width: 160px;">LINE TOTAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <p class="font-w600 mb-1">{{ $product['sku']. ' - ' .$product['name'] }}</p>
                                                <div class="text-muted">{{ $product['memo'] }}</div>
                                            </td>
                                            <td class="text-center">
                                                @if(empty($product['qty']))
                                                    N/A
                                                @else
                                                    {{ $product['qty']. ' ' .$product['uom'] }}
                                                @endif

                                            </td>
                                            <td class="text-end">{{ number_format($product['unitPrice'], 2, '.', ',') }}</td>
                                            <td class="text-end">{{ number_format($product['lineTotal'], 2, '.', ',') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" class="text-end">SUB TOTAL</td>
                                        <td class="text-end">{{ number_format($quotation->subTotal, 2, '.', ',') }}</td>
                                    </tr>
                                    @if(!empty($quotation->discount) || $quotation->discount > 0)
                                        <tr>
                                            <td colspan="3" class="text-end">DISCOUNT</td>
                                            <td class="text-end">
                                                @if(strpos($quotation->discount, "%") !== false)
                                                    {{ $quotation->discount }}
                                                @else
                                                    {{ number_format($quotation->discount, 2, '.', ',') }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @if(!empty($quotation->delivery))
                                        <tr>
                                            <td colspan="3" class="text-end">DELIVERY CHARGES</td>
                                            <td class="text-end">{{ number_format($quotation->delivery, 2, '.', ',') }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="3" class="text-end">GRAND TOTAL</td>
                                        <td class="text-end">{{ number_format($quotation->grandTotal, 2, '.', ',') }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if(Auth::user()->type == 2 && $quotation->statusID == 1)
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/quotations/{{ $quotation->id }}/2" class="btn btn-outline-success">Approve</a>
                                    <a href="/quotations/{{ $quotation->id }}/0" class="btn btn-outline-danger">Reject</a>
                                </div>
                            </div>
                        @endif

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Prescriptions</h4>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered" id="files" >

                                    <tbody>
                                    @foreach($images as $image)
                                        <tr>
                                            <td>
                                                <a target="_blank" href="{{ asset($image->fileP) }}">{{ $image->name }}</a>
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

    </div>
@endsection


