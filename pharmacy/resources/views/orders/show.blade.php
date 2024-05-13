@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Order - {{ 'PHO'.$order->id }}</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">Ordered by: {{ $order->customer->name }}</div>
                            <div class="col-md-3">Ordered mobile: {{ $order->customer->mobile }}</div>
                            <div class="col-md-3">Ordered at: {{ $order->created_at }}</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                Delivery location:
                                {{ json_decode($order->address)->address1.', '.  json_decode($order->address)->address2. ', '. json_decode($order->address)->city.', '. json_decode($order->address)->state.', '. json_decode($order->address)->zip }}
                            </div>
                            <div class="col-md-6">
                                Delivery date and time: {{ $order->deliveryDate.' | '.$order->timeSlot }}
                            </div>
                        </div>

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

                        @if(Auth::user()->type == 1 && $order->statusID == 1)
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/orders/{{ $order->id }}/quotation" class="btn btn-outline-primary">Generate quotation</a>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


