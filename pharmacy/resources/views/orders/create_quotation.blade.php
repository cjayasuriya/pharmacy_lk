@extends('layouts.app')

@section('css_before')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add quotation</div>

                    <div class="card-body">

                        <form>
                            @csrf

                            <input type="hidden" id="order-id" name="order-id" value="{{ $order->id }}" />

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date" class="col-md-4 col-form-label">Quot. date<span style="color: red" class="required">*</span> </label>
                                        <input id="date" type="date" class="form-control" name="date" required>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="validTill" class="col-md-4 col-form-label">Valid till<span style="color: red" class="required">*</span> </label>
                                        <input id="validTill" type="date" class="form-control" name="validTill" required>
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="product-discount" class="col-md-4 col-form-label">Discount<span style="color: red" class="required">*</span> </label>
                                        <input id="product-discount" type="text" class="form-control" name="product-discount" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="product-delivery" class="col-md-4 col-form-label">Delivery<span style="color: red" class="required">*</span> </label>
                                        <input id="product-delivery" type="text" class="form-control" name="product-delivery" required>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Add product</button>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full" id="products">
                                        <thead>
                                        <tr>
                                            <th class="text-center" hidden>#</th>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Memo</th>
                                            <th class="text-center">UOM</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-center">Unit price</th>
                                            <th class="text-center">Line discount</th>
                                            <th class="text-center">Line total</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7"></div>
                                <div class="col-md-3 text-right text-muted">SUB TOTAL</div>
                                <div class="col-md-2 text-right text-muted"><span id="sub-total"></span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-7"></div>
                                <div class="col-md-3 text-right text-muted">DISCOUNT</div>
                                <div class="col-md-2 text-right text-muted"><span id="discount"></span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-7"></div>
                                <div class="col-md-3 text-right text-muted">DELIVERY CHARGES</div>
                                <div class="col-md-2 text-right text-muted"><span id="delivery-charges"></span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-7"></div>
                                <div class="col-md-3 text-right font-w600">GRAND TOTAL</div>
                                <div class="col-md-2 text-right font-w600"><span id="grand-total"></span></div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="container-fluid">
                                    <input type="button" class="btn btn-primary btn-block" id="add-quotation-btn" name="add-quotation-btn" value="Save"/>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add product</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="product-select">Product <span style="color: red" class="required">*</span></label>
                            <select class="form-control" name="product-select" id="product-select">
                                <option value="0" disabled selected>Select an option</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product-memo">Memo</label>
                                <textarea class="form-control" id="product-memo" name="product-memo" placeholder="Memo" rows="2"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="product-unit-price">Unit price <span style="color: red" class="required">*</span></label>
                                <input type="number" class="form-control" id="product-unit-price" name="product-unit-price" placeholder="Unit price" required="required" onkeyup="productLineTotal()"/>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="product-uom">UOM </label>
                                <input type="text" class="form-control" id="product-uom" name="product-uom" placeholder="uom"/>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="product-qty">Qty / Time <span style="color: red" class="required">*</span></label>
                                <input type="number" min="1" step="any" class="form-control" id="product-qty" name="product-qty" placeholder="Qty / Time" required="required" onkeyup="productLineTotal()"/>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product-line-discount">Line discount <span style="color: red" class="required">*</span></label>
                                <input type="text" class="form-control" id="product-line-discount" name="product-line-discount" placeholder="Line discount" value="0" required="required" onkeyup="productLineTotal()"/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product-line-total">Line total <span style="color: red" class="required">*</span></label>
                                <input type="number" min="1" step="any" class="form-control" id="product-line-total" name="product-line-total" placeholder="Line total" required="required"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="container-fluid">
                            <input type="submit" data-dismiss="modal" class="btn btn-primary btn-block" id="modal-add-product-btn" name="modal-add-product-btn" value="Add"/>
                            <br>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@endsection



@section('pagelevelscripts')

    <script>

        //Calculate product modal line total
        function productLineTotal() {
            var qty = document.getElementById('product-qty').value;
            var unitPrice = document.getElementById('product-unit-price').value;
            var lineDiscount = document.getElementById('product-line-discount').value;

            var netTotal = 0;

            if(lineDiscount.includes("%")){
                lineDiscount = parseFloat(lineDiscount.replace('%',''));
                netTotal = ((parseFloat(qty) * parseFloat(unitPrice)) * (100-lineDiscount))/100;
            }else{
                netTotal = (parseFloat(qty) * parseFloat(unitPrice)) - parseFloat(lineDiscount);
            }

            document.getElementById('product-line-total').value = netTotal;
        }

        //Remove table row
        function removeLine(ctl) {
            $(ctl).parents("tr").remove();
            subTotal();
        }

        //Calculate sub total
        function subTotal(){

            var subTotal = 0;
            var table = document.getElementById('products');

            for (var i = 1, row; row = table.rows[i]; i++) {
                subTotal += parseFloat(row.cells[7].innerHTML);
            }

            document.getElementById('sub-total').innerHTML = subTotal;

            grandTotal();

        }

        //Calculate grand total
        function grandTotal() {

            var subTotal  = document.getElementById("sub-total").innerHTML;
            var discount  = document.getElementById("discount").innerHTML;
            var delivery  = document.getElementById("delivery-charges").innerHTML;

            var netTotal = 0;

            if(discount.includes("%")){
                discount = parseFloat(discount.replace('%',''));
                netTotal = ((parseFloat(subTotal)) * (100-discount))/100;
            }else{
                netTotal = (parseFloat(subTotal)) - parseFloat(discount);
            }

            var grandTotal = parseFloat(netTotal) + parseFloat(delivery);
            document.getElementById('grand-total').innerHTML = parseFloat(grandTotal);

        }

        $("#modal-add-product-btn").click(function(){

            var productSelect = document.getElementById("product-select");

            var productID = $("#product-select").val();
            var product = productSelect.options[productSelect.selectedIndex].text;
            var memo = document.getElementById("product-memo").value;
            var uom = document.getElementById("product-uom").value;
            var qty = document.getElementById("product-qty").value;
            var unitPrice = document.getElementById("product-unit-price").value;
            var lineDiscount = document.getElementById("product-line-discount").value;
            var lineTotal = document.getElementById("product-line-total").value;


            $("#products tbody").append(
                "<tr>" +
                "<td class=\"font-size-sm text-muted\" hidden>"+ productID+"</td>" +
                "<td class=\"font-size-sm text-muted\">"+ product+"</td>" +
                "<td class=\"font-size-sm text-muted\">"+ memo+"</td>" +
                "<td class=\"font-size-sm text-muted\">"+ uom+"</td>" +
                "<td class=\"font-size-sm text-muted text-right\">"+ qty+"</td>" +
                "<td class=\"font-size-sm text-muted text-right\">"+unitPrice +"</td>" +
                "<td class=\"font-size-sm text-muted text-right\">"+ lineDiscount+"</td>" +
                "<td class=\"font-size-sm text-muted text-right\">"+ lineTotal+"</td>" +
                "<td class=\"font-size-sm text-muted text-center\"><a href=\"#\" onclick='removeLine(this);'>Remove</a></td>" +
                "</tr>"
            );

            subTotal();

        });

        $(document).ready(function(){

            $("#product-discount").keyup(function(){
                var discount = document.getElementById("product-discount").value;
                document.getElementById('discount').innerHTML = discount;
                subTotal();
            });

            $("#product-delivery").keyup(function(){
                var delivery = document.getElementById("product-delivery").value;
                document.getElementById('delivery-charges').innerHTML = delivery;
                subTotal();
            });

            //Get Product
            $("#product-select").change(function(){
                var productID = $("#product-select").val();

                var postData = {
                    productID: productID,
                };

                axios.post('/products/'+productID+'/for-quotation', postData).then(function (response) {

                    document.getElementById('product-unit-price').value = response.data.unitPrice;
                    document.getElementById('product-uom').value = response.data.uom;


                }).catch(function (error) {
                    // alert(error)
                });

            });

            //Save quotation
            $("#add-quotation-btn").click(function(){

                var table = document.getElementById("products");
                var orderID = $("#order-id").val();

                var products = [];
                for (var i = 1, row; row = table.rows[i]; i++) {
                    var product = {
                        id: row.cells[0].innerHTML,
                        name: row.cells[1].innerHTML,
                        memo: row.cells[2].innerHTML,
                        uom: row.cells[3].innerHTML,
                        qty: row.cells[4].innerHTML,
                        unitPrice: row.cells[5].innerHTML,
                        lineDiscount: row.cells[6].innerHTML,
                        lineTotal: row.cells[7].innerHTML,
                    };
                    products.push(product);
                }

                var postData = {
                    orderID: orderID,
                    quotDate: $("#date").val(),
                    validTill: $("#validTill").val(),
                    products: products,
                    subTotal: document.getElementById("sub-total").innerHTML,
                    discount: $("#product-discount").val(),
                    delivery: $("#product-delivery").val(),
                    grandTotal: document.getElementById('grand-total').innerHTML,
                };

                axios.post('/orders/'+orderID+'/quotation/create/save', postData).then(function (response) {
                    window.location = '/home';
                }).catch(function (error) {
                    alert(error)
                });

            });

        });

    </script>

@endsection
