@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add order</div>

                    <div class="card-body">

                        <form name="orderForm" id="orderForm" action="/orders/create/save" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-3">
                                    <label for="address1" class="col-md-4 col-form-label">Address 1 <span style="color: red" class="required">*</span> </label>
                                    <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ $address->address1 }}" required autocomplete="address1">
                                    @error('address1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="address2" class="col-md-4 col-form-label">Address 2  </label>
                                    <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="name" value="{{ $address->address2 }}" autocomplete="address2">
                                    @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="city" class="col-md-4 col-form-label">City <span style="color: red" class="required">*</span> </label>
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $address->city }}" required autocomplete="city">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-md-3">
                                    <label for="state" class="col-md-4 col-form-label">State <span style="color: red" class="required">*</span> </label>
                                    <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $address->state }}" required autocomplete="state">
                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="zip" class="col-md-4 col-form-label">ZIP <span style="color: red" class="required">*</span> </label>
                                    <input id="zip" type="number" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{$address->zip }}" required autocomplete="state">
                                    @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="delivery" class="col-md-4 col-form-label">Delivery<span style="color: red" class="required">*</span> </label>
                                    <input id="delivery" type="date" class="form-control @error('delivery') is-invalid @enderror" name="delivery" value="{{ old('delivery') }}" onchange="getDate()" required autocomplete="delivery">
                                    @error('delivery')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="timeslot" class="col-md-4 col-form-label">Time slot<span style="color: red" class="required">*</span> </label>
                                    <select id="timeslot" type="date" class="form-control @error('timeslot') is-invalid @enderror" name="timeslot" value="{{ old('timeslot') }}"required autocomplete="delivery">
                                        <option value="0" disabled selected>Select an option</option>
                                        <option value="8 AM - 10 AM" >8 AM - 10 AM</option>
                                        <option value="10 AM - 12 Noon" >10 AM - 12 Noon</option>
                                        <option value="12 Noon - 2 PM" >12 Noon - 2 PM</option>
                                        <option value="2 PM - 4 PM" >2 PM - 4 PM</option>
                                        <option value="4 PM - 6 PM" >4 PM - 6 PM</option>
                                        <option value="4 PM - 8 PM" >6 PM - 8 PM</option>
                                    </select>
                                    @error('timeslot')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="notes" class="col-md-4 col-form-label">Notes </label>
                                    <textarea id="notes" type="notes" class="form-control @error('notes') is-invalid @enderror" name="notes" value="{{ old('notes') }}" autocomplete="notes"></textarea>
                                    @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="images" class="col-md-4 col-form-label">Attachments <span style="color: red" class="required">*</span> </label>
                                    <input type="file" accept=".png,.jpeg" class="form-control" id="images" name="imageFile[]" multiple/>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="container-fluid">
                                    <input type="submit" class="btn btn-outline-primary btn-block" id="add-order-btn" name="add-order-btn" value="Save"/>
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

<script>

    function getDate() {
        var givenDate = Date.parse(document.orderForm.delivery.value);
        if (!givenDate.isNaN) {
            givenDate = new Date(givenDate).setHours(0,0,0,0);
            var todaysDate = new Date().setHours(0, 0, 0, 0);

            if (givenDate >= todaysDate) {

            } else {
                alert('Please choose a future date');
            }
        }
    }

</script>
