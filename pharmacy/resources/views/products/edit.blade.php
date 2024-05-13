@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add product</div>

                    <div class="card-body">

                        <form action="/products/{{$product->id}}/edit/update" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-3">
                                    <label for="sku" class="col-md-4 col-form-label">SKU <span style="color: red" class="required">*</span> </label>
                                    <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ $product->sku }}" required autocomplete="sku">
                                    @error('sku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="col-md-4 col-form-label">Name <span style="color: red" class="required">*</span> </label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="brand" class="col-md-4 col-form-label">Brand <span style="color: red" class="required">*</span> </label>
                                    <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $product->brand }}" required autocomplete="brand">
                                    @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-md-3">
                                    <label for="uom" class="col-md-4 col-form-label">UOM <span style="color: red" class="required">*</span> </label>
                                    <input id="uom" type="text" class="form-control @error('uom') is-invalid @enderror" name="uom" value="{{ $product->uom }}" required autocomplete="uom">
                                    @error('uom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="selling_price" class="col-md-4 col-form-label">Selling price <span style="color: red" class="required">*</span> </label>
                                    <input id="selling_price" type="number" step="any" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price" value="{{ json_decode($product->prices)->selling }}" required autocomplete="selling_price">
                                    @error('selling_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="lowest_price" class="col-md-4 col-form-label">Lowest price <span style="color: red" class="required">*</span> </label>
                                    <input id="lowest_price" type="text" class="form-control @error('lowest_price') is-invalid @enderror" name="lowest_price" value="{{ json_decode($product->prices)->lowest }}" required autocomplete="lowest_price">
                                    @error('lowest_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="container-fluid">
                                    <input type="submit" class="btn btn-outline-primary btn-block" id="update-product-btn" name="update-product-btn" value="Save"/>
                                    <br>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
