@extends('backend.layout.main') @section('content')
    @push('css')
        <style>
            @media print {
                .hidden-print {
                    display: none !important;
                }
            }
        </style>
    @endpush
    @if (session()->has('not_permitted'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
                aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
                aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('error') }}</div>
    @endif
    <section id="pos-layout" class="forms hidden-print">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Packing</h4>
                        </div>
                        <div class="card-body">

                            <div class="col-12">

                                <form action="{{ route('packingSlip.store') }}" method="POST"
                                    class="packing-slip-form row">
                                    @csrf
                                    {{-- <div class="col-12 pb-5">
                                        @if (isset(auth()->user()->warehouse_id))
                                            <input type="hidden" name="warehouse_id" id="warehouse_id"
                                                value="{{ auth()->user()->warehouse_id }}" />
                                        @else
                                            <div class="col-12 ">
                                                <div class="form-group">
                                                    <label>{{ trans('file.Warehouse') }} *</label>
                                                    <select required name="warehouse_id" id="warehouse_id"
                                                        class="selectpicker form-control" data-live-search="true"
                                                        data-live-search-style="begins" title="Select warehouse...">
                                                        @foreach ($lims_warehouse_list as $warehouse)
                                                            <option value="{{ $warehouse->id }}">
                                                                {{ $warehouse->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label>{{ trans('file.Select Product') }}</label>
                                                <div class="search-box input-group">
                                                    <button type="button" class="btn btn-secondary btn-lg"><i
                                                            class="fa fa-barcode"></i></button>
                                                    <input type="text" name="product_code_name"
                                                        id="lims_productcodeSearch"
                                                        placeholder="Please type product code and select..."
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">

                                        <input type="hidden" value="{{ $data['sale_id'] }}" name="sale_id">
                                        <input type="hidden" value="{{ $data['amount'] }}" name="amount">
                                        <input type="hidden" value="{{ $packing_weight }}" name="weight">
                                        <input type="hidden" value="{{ $sale->shipping_name ? $sale->shipping_name : $customer_data->name }}" name="recipient_name">
                                        <input type="hidden" value="{{ $sale->shipping_phone ? $sale->shipping_phone : $customer_data->phone_number }}"
                                            name="recipient_contact_1">
                                        <input type="hidden" value="{{ $sale->shipping_phone_2 ? $sale->shipping_phone_2 : $customer_data->phone_number_2 }}"
                                            name="recipient_contact_2">
                                        <input type="hidden" value="{{ $sale->shipping_address ? $sale->shipping_address : $customer_data->address }}"
                                            name="recipient_address">
                                        <input type="hidden" value="{{ $sale->shipping_city ? $sale->shipping_city : $customer_data->city }}" name="recipient_city">

                                        <div class="col-md-12 form-group">
                                            <h5>Product List</h5>
                                            <table class="table table-bordered table-hover product-list mt-3">
                                                <thead>
                                                    <tr>
                                                        <th>{{ trans('file.name') }}</th>
                                                        <th>{{ trans('file.Code') }}</th>
                                                        <th>Qty</th>
                                                        <th>{{ trans('file.Unit Price') }}</th>
                                                        <th>{{ trans('file.Total Price') }}</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($data as $key => $item)
                                                        @if (is_array($item))
                                                            <tr>
                                                                <td>{{ $item['name'] }}</td>
                                                                <td>{{ $item['code'] }}</td>
                                                                <td>{{ $item['qty'] }}</td>
                                                                <td>{{ $item['unit_price'] }}</td>
                                                                <td>{{ $item['total_price'] }}</td>
                                                                <td id="status" class="bg-danger text-white text-center">
                                                                    Not-Completed</td>
                                                            </tr>

                                                            <input type="hidden"
                                                                name="products[{{ $key }}][product_id]"
                                                                value="{{ $item['product_id'] }}">
                                                            <input type="hidden"
                                                                name="products[{{ $key }}][name]"
                                                                value="{{ $item['name'] }}">
                                                            <input type="hidden"
                                                                name="products[{{ $key }}][code]"
                                                                value="{{ $item['code'] }}">
                                                            <input type="hidden" name="products[{{ $key }}][qty]"
                                                                value="{{ $item['qty'] }}">
                                                            <input type="hidden"
                                                                name="products[{{ $key }}][unit_price]"
                                                                value="{{ $item['unit_price'] }}">
                                                            <input type="hidden"
                                                                name="products[{{ $key }}][total_price]"
                                                                value="{{ $item['total_price'] }}">
                                                            <input type="hidden"
                                                                name="products[{{ $key }}][is_packing]"
                                                                id="product-status-{{ $key }}" value="false">
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>



                                    </div>

                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="col-md-12">

                                                @if (isset(auth()->user()->warehouse_id))
                                                    <input type="hidden" name="warehouse_id" id="warehouse_id"
                                                        value="{{ auth()->user()->warehouse_id }}" />
                                                @else
                                                    <div class="col-12 ">
                                                        <div class="form-group">
                                                            <label>{{ trans('file.Warehouse') }} *</label>
                                                            <select required name="warehouse_id" id="warehouse_id"
                                                                class="selectpicker form-control" data-live-search="true"
                                                                data-live-search-style="begins" title="Select warehouse...">
                                                                @foreach ($lims_warehouse_list as $warehouse)
                                                                    <option value="{{ $warehouse->id }}">
                                                                        {{ $warehouse->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <label>{{ trans('file.Select Product') }}</label>
                                                        <div class="search-box input-group">
                                                            <button type="button" class="btn btn-secondary btn-lg"><i
                                                                    class="fa fa-barcode"></i></button>
                                                            <input type="text" name="product_code_name"
                                                                id="lims_productcodeSearch"
                                                                placeholder="Please type product code and select..."
                                                                class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="mt-4">Selected List</h5>
                                                <div class="table-responsive mt-3">
                                                    <table id="myTable"
                                                        class="table table-hover order-list order-list-product">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ trans('file.name') }}</th>
                                                                <th>{{ trans('file.Code') }}</th>
                                                                <th>{{ trans('file.Quantity') }}</th>
                                                                <th>C/R</th>
                                                                <th><i class="dripicons-trash"></i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                        <tfoot class="tfoot active">
                                                            <th colspan="2">{{ trans('file.Total') }}</th>
                                                            <th id="total-qty">0</th>



                                                        </tfoot>
                                                    </table>
                                                </div>


                                                @if ($sale->delivery_type == 'Main Courier')
                                                    <div class="col-12 courier-section">
                                                        <div class="form-group">
                                                            <label><strong>Courier *</strong></label>
                                                            <select name="courier_id" required id="courier-id"
                                                                class="selectpicker form-control" data-live-search="true"
                                                                data-live-search-style="begins" title="Select courier...">
                                                                @foreach ($courier_list as $courier)
                                                                    @if ($courier->name == 'Main Courier')
                                                                        <option value="{{ $courier->id }}" selected>
                                                                            {{ $courier->name . ' [' . $courier->phone_number . ']' }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="col-12">
                                                        <div class="row">
                                                            <div class="form-group col-md-8">
                                                                <label><strong>Waybill Id *</strong></label>
                                                                <input type="text" name="waybill_id"
                                                                    class="form-control" id="waybill_id" required
                                                                    readonly />

                                                            </div>
                                                            <button type="button" class="col-md-4 btn btn-warning"
                                                                id="getWaybillId">Get Waybill Id</button>
                                                        </div>
                                                    </div> --}}
                                                @else
                                                    <div class="col-12 courier-section">
                                                        <div class="form-group">
                                                            <label><strong>Courier *</strong></label>
                                                            <select name="courier_id" required id="courier-id"
                                                                class="selectpicker form-control" data-live-search="true"
                                                                data-live-search-style="begins" title="Select courier...">
                                                                @foreach ($courier_list as $courier)
                                                                    {{-- @if ($courier->name != 'Main Courier') --}}
                                                                        <option value="{{ $courier->id }}">
                                                                            {{ $courier->name . ' [' . $courier->phone_number . ']' }}
                                                                        </option>
                                                                    {{-- @endif --}}
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label><strong>Waybill Id *</strong></label>
                                                                <input type="text" name="waybill_id"
                                                                    class="form-control" id="waybill_id"
                                                                     />

                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="hidden" name="total_qty" />
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group col-12">
                                        <button id="submit-button" type="submit"
                                            class="btn btn-primary packing-slip-submit-btn col-12"
                                            disabled>{{ trans('file.submit') }}</button>
                                    </div>
                                </form>

                                <hr />






                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="print-layout">
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).on("change", "#warehouse_id", function() {
            localStorage.setItem("packing_warehouse_id", $(this).val());
        });

        $(document).on('submit', '.packing-slip-form', function(e) {
            const button = document.getElementById('submit-button');
            button.disabled = true;
            button.innerText = 'Submitting...';
        });
        $(document).ready(function() {
            // Restore warehouse selection
            let savedWarehouseId = localStorage.getItem("packing_warehouse_id");
            if (savedWarehouseId) {
                $("#warehouse_id").val(savedWarehouseId).change();
            }
        })
        $("ul#sale").siblings('a').attr('aria-expanded', 'true');
        $("ul#sale").addClass("show");
        $("ul#sale #sale-create-menu").addClass("active");



        $('#currency').change(function() {
            var rate = $(this).find(':selected').data('rate');
            var currency_id = $(this).val();
            $('#exchange_rate').val(rate);
            currency['exchange_rate'] = rate;
            $("table.order-list tbody .qty").each(function(index) {
                rowindex = index;
                currencyChange = true;
                checkDiscount($(this).val(), true);
            });
        });

        $('.customer-submit-btn').on("click", function() {
            $.ajax({
                type: 'POST',
                url: '{{ route('customer.store') }}',
                data: $("#customer-form").serialize(),
                success: function(response) {
                    key = response['id'];
                    value = response['name'] + ' [' + response['phone_number'] + ']';
                    $('select[name="customer_id"]').append('<option value="' + key + '">' + value +
                        '</option>');
                    $('select[name="customer_id"]').val(key);
                    $('.selectpicker').selectpicker('refresh');
                    $("#addCustomer").modal('hide');
                    setCustomerGroupRate(key);
                }
            });
        });

        function setCustomerGroupRate(id) {
            $.get('getcustomergroup/' + id, function(data) {
                customer_group_rate = (data / 100);
            });
        }

        $("#payment").hide();
        $(".card-element").hide();
        $("#gift-card").hide();
        $("#cheque").hide();

        // array data depend on warehouse
        var lims_product_array = [];
        var product_code = [];
        var product_name = [];
        var product_qty = [];
        var product_type = [];
        var product_id = [];
        var product_list = [];
        var variant_list = [];
        var qty_list = [];
        var currency = [];

        currency['exchange_rate'] = 1;

        // array data with selection
        var product_price = [];
        var wholesale_price = [];
        var cost = [];
        var product_discount = [];
        var tax_rate = [];
        var tax_name = [];
        var tax_method = [];
        var unit_name = [];
        var unit_operator = [];
        var unit_operation_value = [];
        var is_imei = [];
        var is_variant = [];
        var gift_card_amount = [];
        var gift_card_expense = [];
        // temporary array
        var temp_unit_name = [];
        var temp_unit_operator = [];
        var temp_unit_operation_value = [];

        var deposit = 0;
        var points = 0;

        var reward_point_setting = [];

        var rowindex;
        var customer_group_rate;
        var row_product_price;
        var pos;
        var role_id = <?php echo json_encode(Auth::user()->role_id); ?>;

        var without_stock = <?php echo json_encode($general_setting->without_stock); ?>;
        var currencyChange = false;

        $('.selectpicker').selectpicker({
            style: 'btn-link',
        });

        $('[data-toggle="tooltip"]').tooltip();

        $('select[name="customer_id"]').on('change', function() {
            setCustomerGroupRate($(this).val());
        });

        var warehouse_id = $("#warehouse_id").val();
        if (warehouse_id.length) {
            getProduct(warehouse_id);
            isCashRegisterAvailable(warehouse_id);
        }

        $('select[name="warehouse_id"]').on('change', function() {
            var warehouse_id = $(this).val();
            getProduct(warehouse_id);
            isCashRegisterAvailable(warehouse_id);
        });

        function getProduct(warehouse_id) {
            $.get('/sales/getproduct/' + warehouse_id, function(data) {
                lims_product_array = [];
                product_code = data[0];
                product_name = data[1];
                product_qty = data[2];
                product_type = data[3];
                product_id = data[4];
                product_list = data[5];
                qty_list = data[6];
                product_warehouse_price = data[7];
                batch_no = data[8];
                expired_date = data[10];
                product_batch_id = data[9];
                is_embeded = data[11];
                imei_number = data[12];

                $.each(product_code, function(index) {
                    lims_product_array.push(product_code[index] + '|' + product_name[index] + '|' +
                        imei_number[index] + '|' + is_embeded[index]);
                });

                console.log(lims_product_array);

                //updating in stock
                var rownumber = $('table.order-list tbody tr:last').index();
                for (rowindex = 0; rowindex <= rownumber; rowindex++) {
                    var row_product_code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.product-code').val();
                    pos = product_code.indexOf(row_product_code);
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.in-stock').text(
                        product_qty[pos]);
                }
            });
        }

        $('#lims_productcodeSearch').on('input', function() {
            var customer_id = $('#customer_id').val();
            var warehouse_id = $('#warehouse_id').val();
            temp_data = $('#lims_productcodeSearch').val();
            console.log('temp_data', temp_data);
            getProduct(warehouse_id);


        });

        function checkRowMatch(data) {

            $(".product-list tbody tr").each(function(index) {
                let rowCode = $(this).find("td:nth-child(2)").text().trim();
                let rowQty = parseFloat($(this).find("td:nth-child(3)").text().trim());
                let rowName = $(this).find("td:nth-child(1)").text().trim();
                let rowUnitPrice = parseFloat($(this).find("td:nth-child(4)").text().trim());

                var isOk = false;
                data.forEach(function(item, index) {

                    if (rowCode == item.code && rowQty == item.qty) {
                        isOk = true;

                    } else {
                        if (!isOk) {
                            isOk = false;
                        }
                    }
                });

                if (isOk) {
                    $(this)
                        .find("#status")
                        .removeClass("bg-danger")
                        .addClass("bg-success")
                        .text("Completed");

                    $(`#product-status-${index}`).val("true");
                } else {
                    $(this)
                        .find("#status")
                        .removeClass("bg-success")
                        .addClass("bg-danger")
                        .text("Not-Completed");

                    $(`#product-status-${index}`).val("false");
                }


            });


            var allCompleted = true;
            $(".product-list tbody tr").each(function() {

                var myTableRows = $("#myTable tbody tr").length;
                var productListRows = $(".product-list tbody tr").length;

                var status = $(this).find("#status").text().trim();

                if (status != "Completed") {
                    allCompleted = false;
                }
                if (myTableRows != productListRows) {
                    allCompleted = false;
                }
            });

            if (allCompleted) {
                $("#submit-button").prop("disabled", false);
            } else {
                $("#submit-button").prop("disabled", true);
            }
        }


        function checkAllProduct() {
            const products = [];
            const rows = $("#myTable tbody tr");

            rows.each(function() {
                const productName = $(this).find("td:nth-child(1)").text().trim();
                const productCode = $(this).find("td:nth-child(2)").text().trim();
                const productQty = $(this).find("td:nth-child(3) input.qty").val();
                const status = $(this).find("td:nth-child(4)");
                console.log("123",productCode);
                $(".product-list tbody tr").each(function(index) {
                    let rowCode = $(this).find("td:nth-child(2)").text().trim();
                    console.log("ASDAS",rowCode,productCode);
                    if (rowCode == productCode) {
                        status.removeClass("bg-danger")
                            .addClass("bg-success")
                            .text("Correct");
                    } 

                });
                products.push({
                    name: productName,
                    code: productCode,
                    qty: productQty ? parseFloat(productQty) : 0,
                });
            });

            checkRowMatch(products);

        }

        var lims_productcodeSearch = $('#lims_productcodeSearch');

        lims_productcodeSearch.autocomplete({
                source: function(request, response) {
                var terms = request.term.toLowerCase().split(/\s+/);
                response($.grep(lims_product_array, function(item) {
                    var itemText = item.toLowerCase();
                    return terms.every(function(term) {
                        return itemText.includes(term);
                    });
                }));
            },
            response: function(event, ui) {
                console.log('ui', ui);
                if (ui.content.length == 1) {
                    var data = ui.content[0].value;
                    $(this).autocomplete("close");
                    $(".ui-helper-hidden-accessible").css('display', 'none');
                    productSearch(data);
                } else if (ui.content.length == 0 && $('#lims_productcodeSearch').val().length == 13) {
                    $(".ui-helper-hidden-accessible").css('display', 'none');
                    productSearch($('#lims_productcodeSearch').val() + '|' + 1);
                }
            },
            select: function(event, ui) {
                var data = ui.item.value;
                $(".ui-helper-hidden-accessible").css('display', 'none');
                productSearch(data);
            }
        });

        //Change quantity
        $("#myTable").on('input', '.qty', function() {
            rowindex = $(this).closest('tr').index();

            if ($(this).val() < 0 && $(this).val() != '') {
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(1);
                alert("Quantity can't be less than 0");
            }
            if (is_variant[rowindex])
                checkQuantity($(this).val(), true);
            else
                checkDiscount($(this).val(), true);
            //checkQuantity($(this).val(), true);
        });


        //Delete product
        $("table.order-list tbody").on("click", ".ibtnDel", function(event) {
            rowindex = $(this).closest('tr').index();
            product_price.splice(rowindex, 1);
            wholesale_price.splice(rowindex, 1);
            product_discount.splice(rowindex, 1);
            tax_rate.splice(rowindex, 1);
            tax_name.splice(rowindex, 1);
            tax_method.splice(rowindex, 1);
            unit_name.splice(rowindex, 1);
            unit_operator.splice(rowindex, 1);
            unit_operation_value.splice(rowindex, 1);
            is_imei.splice(rowindex, 1);
            $(this).closest("tr").remove();
            calculateTotal();
            checkAllProduct();
        });

        //Edit product
        $("table.order-list").on("click", ".edit-product", function() {
            rowindex = $(this).closest('tr').index();
            edit();
        });

        //Update product
        $('button[name="update_btn"]').on("click", function() {
            if (is_imei[rowindex]) {
                var imeiNumbers = '';
                $("#editModal .imei-numbers").each(function(i) {
                    if (i)
                        imeiNumbers += ',' + $(this).val();
                    else
                        imeiNumbers = $(this).val();
                });
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.imei-number').val(
                    imeiNumbers);
            }

            var edit_discount = $('input[name="edit_discount"]').val();
            var edit_qty = $('input[name="edit_qty"]').val();
            var edit_unit_price = $('input[name="edit_unit_price"]').val();

            if (parseFloat(edit_discount) > parseFloat(edit_unit_price)) {
                alert('Invalid Discount Input!');
                return;
            }

            if (edit_qty < 0) {
                $('input[name="edit_qty"]').val(1);
                edit_qty = 1;
                alert("Quantity can't be less than 0");
            }

            var tax_rate_all = 0;
            tax_rate[rowindex] = parseFloat(tax_rate_all[$('select[name="edit_tax_rate"]').val()]);
            tax_name[rowindex] = $('select[name="edit_tax_rate"] option:selected').text();
            if (product_type[pos] == 'standard') {
                var row_unit_operator = unit_operator[rowindex].slice(0, unit_operator[rowindex].indexOf(","));
                var row_unit_operation_value = unit_operation_value[rowindex].slice(0, unit_operation_value[
                    rowindex].indexOf(","));
                if (row_unit_operator == '*') {
                    product_price[rowindex] = $('input[name="edit_unit_price"]').val() / row_unit_operation_value;
                } else {
                    product_price[rowindex] = $('input[name="edit_unit_price"]').val() * row_unit_operation_value;
                }
                var position = $('select[name="edit_unit"]').val();
                var temp_operator = temp_unit_operator[position];
                var temp_operation_value = temp_unit_operation_value[position];
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.sale-unit').val(
                    temp_unit_name[position]);
                temp_unit_name.splice(position, 1);
                temp_unit_operator.splice(position, 1);
                temp_unit_operation_value.splice(position, 1);

                temp_unit_name.unshift($('select[name="edit_unit"] option:selected').text());
                temp_unit_operator.unshift(temp_operator);
                temp_unit_operation_value.unshift(temp_operation_value);

                unit_name[rowindex] = temp_unit_name.toString() + ',';
                unit_operator[rowindex] = temp_unit_operator.toString() + ',';
                unit_operation_value[rowindex] = temp_unit_operation_value.toString() + ',';
            } else {
                product_price[rowindex] = $('input[name="edit_unit_price"]').val();
            }
            product_discount[rowindex] = $('input[name="edit_discount"]').val();
            checkDiscount(edit_qty, false);
            //checkQuantity(edit_qty, false);
        });

        $("select[name=price_option]").on("change", function() {
            $("#editModal input[name=edit_unit_price]").val($(this).val());
        });

        $("#myTable").on("change", ".batch-no", function() {
            rowindex = $(this).closest('tr').index();
            var product_id = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.product-id')
                .val();
            var warehouse_id = $('#warehouse_id').val();
            $.get('../check-batch-availability/' + product_id + '/' + $(this).val() + '/' + warehouse_id, function(
                data) {
                if (data['message'] != 'ok') {
                    alert(data['message']);
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.batch-no').val(
                        '');
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.product-batch-id').val('');
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.expired-date')
                        .text('');
                } else {
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.product-batch-id').val(data['product_batch_id']);
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.expired-date')
                        .text(data['expired_date']);
                    code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.product-code').val();
                    pos = product_code.indexOf(code);
                    product_qty[pos] = data['qty'];
                }
            });
        });

        function isCashRegisterAvailable(warehouse_id) {
            $.ajax({
                url: '../cash-register/check-availability/' + warehouse_id,
                type: "GET",
                success: function(data) {
                    if (data == 'false') {
                        $('#cash-register-modal select[name=warehouse_id]').val(warehouse_id);
                        $('.selectpicker').selectpicker('refresh');
                        if (role_id <= 2) {
                            $("#cash-register-modal .warehouse-section").removeClass('d-none');
                        } else {
                            $("#cash-register-modal .warehouse-section").addClass('d-none');
                        }
                        $("#cash-register-modal").modal('show');
                    }
                }
            });
        }

        function productSearch(data) {
            var product_info = data.split("|");
            var code = product_info[0];
            var pre_qty = 0;
            var flag = true;
            var qtyToCheck = parseFloat(product_info[15]);
            var rowFound = false;
            $(".product-code").each(function(i) {

                if ($(this).val() == code) {
                    rowindex = i;
                    if (product_info[2] != 'null') {
                        imeiNumbers = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .imei-number')
                            .val();
                        imeiNumbersArray = imeiNumbers.split(",");
                        // console.log('arra '+ rowindex);

                        if (imeiNumbersArray.includes(product_info[2])) {
                            alert('Same imei or serial number is not allowed!');
                            flag = false;
                            $('#lims_productcodeSearch').val('');
                        }
                    }
                    pre_qty = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val();
                }
            });


            if (flag) {
                data += '?' + $('#customer_id').val() + '?' + (parseFloat(pre_qty) + 1);
                $.ajax({
                    type: 'GET',
                    url: '/sales/lims_product_search',
                    data: {
                        data: data
                    },
                    success: function(data) {
                        var flag = 1;
                        var qty = data[15];
                        if (pre_qty > 0) {
                            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(qty);
                            pos = product_code.indexOf(data[1]);

                            if (!data[11] && product_warehouse_price[pos]) {
                                product_price[rowindex] = parseFloat(product_warehouse_price[pos] * currency[
                                    'exchange_rate']) + parseFloat(product_warehouse_price[pos] * currency[
                                    'exchange_rate'] * customer_group_rate);
                            } else {
                                product_price[rowindex] = parseFloat(data['online_price'] * currency[
                                        'exchange_rate']) +
                                    parseFloat(data['online_price'] * currency['exchange_rate'] *
                                        customer_group_rate);
                            }
                            flag = 0;
                            checkQuantity(String(qty), true);
                            flag = 0;
                        }
                        $("input[name='product_code_name']").val('');


                        if (flag) {
                            var newRow = $("<tr>");
                            var cols = '';
                            pos = product_code.indexOf(data[1]);
                            temp_unit_name = (data[6]).split(',');
                            cols += '<td>' + data[0] +
                                '';
                            cols += '<td>' + data[1] + '</td>';
                            cols += '<td><input type="text" class="form-control qty" name="qty[]" value="' +
                                data[15] + '" required/></td>';

                            cols +=
                                '<td class="bg-danger text-white text-center align-middle">Wrong</td>';
                            cols +=
                                '<td><button type="button" class="ibtnDel btn btn-md btn-danger">{{ trans('file.delete') }}</button></td>';

                            cols += '<input type="hidden" class="product-code" name="product_code[]" value="' +
                                data[1] + '"/>';
                            cols += '<input type="hidden" class="product-id" name="product_id[]" value="' +
                                data[9] + '"/>';
                            cols += '<input type="hidden" class="sale-unit" name="sale_unit[]" value="' +
                                temp_unit_name[0] + '"/>';
                            cols += '<input type="hidden" class="net_unit_price" name="net_unit_price[]" />';
                            cols += '<input type="hidden" class="discount-value" name="discount[]" />';
                            cols += '<input type="hidden" class="tax-rate" name="tax_rate[]" value="' + data[
                                3] + '"/>';
                            cols += '<input type="hidden" class="tax-value" name="tax[]" />';
                            cols += '<input type="hidden" class="subtotal-value" name="subtotal[]" />';
                            cols +=
                                '<input type="hidden" class="product_weight" name="product_weight[]" value="' +
                                data['product_weight'] + '"/>';

                            if (data[18])
                                cols +=
                                '<input type="hidden" class="imei-number" name="imei_number[]" value="' + data[
                                    18] + '" />';
                            else
                                cols +=
                                '<input type="hidden" class="imei-number" name="imei_number[]" value="" />';
                            cols += '</tr>';
                            newRow.append(cols);
                            $("table.order-list tbody").prepend(newRow);
                            rowindex = newRow.index();

                            if (!data[11] && product_warehouse_price[pos]) {
                                product_price.splice(rowindex, 0, parseFloat(product_warehouse_price[pos] *
                                    currency['exchange_rate']) + parseFloat(product_warehouse_price[
                                    pos] * currency['exchange_rate'] * customer_group_rate));
                            } else {
                                product_price.splice(rowindex, 0, parseFloat(data['online_price'] * currency[
                                    'exchange_rate']) + parseFloat(data['online_price'] * currency[
                                        'exchange_rate'] *
                                    customer_group_rate));
                            }
                            if (data[16])
                                wholesale_price.splice(rowindex, 0, parseFloat(data[16] * currency[
                                    'exchange_rate']) + parseFloat(data[16] * currency['exchange_rate'] *
                                    customer_group_rate));
                            else
                                wholesale_price.splice(rowindex, 0,
                                    '{{ number_format(0, $general_setting->decimal ) }}');
                            cost.splice(rowindex, 0, parseFloat(data[17] * currency['exchange_rate']));
                            product_discount.splice(rowindex, 0,
                                '{{ number_format(0, $general_setting->decimal ) }}');
                            tax_rate.splice(rowindex, 0, parseFloat(data[3]));
                            tax_name.splice(rowindex, 0, data[4]);
                            tax_method.splice(rowindex, 0, data[5]);
                            unit_name.splice(rowindex, 0, data[6]);
                            unit_operator.splice(rowindex, 0, data[7]);
                            unit_operation_value.splice(rowindex, 0, data[8]);
                            is_imei.splice(rowindex, 0, data[13]);
                            is_variant.splice(rowindex, 0, data[14]);
                            checkQuantity(data[15], true);
                            // if(data[13]) {
                            //     populatePriceOption();
                            //     $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.edit-product').click();
                            // }
                        } else if (data[18]) {
                            var imeiNumbers = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')')
                                .find('.imei-number').val();
                            if (imeiNumbers)
                                imeiNumbers += ',' + data[18];
                            else
                                imeiNumbers = data[18];
                            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                                '.imei-number').val(imeiNumbers);
                        }
                    }
                });
            }


            checkAllProduct();
        }

        function populatePriceOption() {
            $('#editModal select[name=price_option]').empty();
            $('#editModal select[name=price_option]').append('<option value="' + product_price[rowindex] + '">' +
                product_price[rowindex] + '</option>');
            if (wholesale_price[rowindex] > 0)
                $('#editModal select[name=price_option]').append('<option value="' + wholesale_price[rowindex] + '">' +
                    wholesale_price[rowindex] + '</option>');
            $('.selectpicker').selectpicker('refresh');
        }

        function edit() {
            $(".imei-section").remove();
            if (is_imei[rowindex]) {
                var imeiNumbers = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.imei-number')
                    .val();
                if (imeiNumbers.length) {
                    imeiArrays = imeiNumbers.split(",");
                    htmlText = `<div class="col-md-8 form-group imei-section">
                        <label>IMEI or Serial Numbers</label>
                        <div class="table-responsive ml-2">
                            <table id="imei-table" class="table table-hover">
                                <tbody>`;
                    for (var i = 0; i < imeiArrays.length; i++) {
                        htmlText +=
                            `<tr>
                                <td>
                                    <input type="text" class="form-control imei-numbers" name="imei_numbers[]" value="` +
                            imeiArrays[i] + `" />
                                </td>
                                <td>
                                    <button type="button" class="imei-del btn btn-sm btn-danger">X</button>
                                </td>
                            </tr>`;
                    }
                    htmlText += `</tbody>
                            </table>
                        </div>
                    </div>`;
                    $("#editModal .modal-element").append(htmlText);
                }
            }
            populatePriceOption();
            $("#product-cost").text(cost[rowindex]);
            var row_product_name = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('td:nth-child(1)')
                .text();
            var row_product_code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('td:nth-child(2)')
                .text();
            $('#modal_header').text(row_product_name + '(' + row_product_code + ')');

            var qty = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val();
            $('input[name="edit_qty"]').val(qty);

            $('input[name="edit_discount"]').val(parseFloat(product_discount[rowindex]).toFixed(
                {{ $general_setting->decimal }}));

            var tax_name_all = [];
            pos = tax_name_all.indexOf(tax_name[rowindex]);
            $('select[name="edit_tax_rate"]').val(pos);

            pos = product_code.indexOf(row_product_code);
            if (product_type[pos] == 'standard') {
                unitConversion();
                temp_unit_name = (unit_name[rowindex]).split(',');
                temp_unit_name.pop();
                temp_unit_operator = (unit_operator[rowindex]).split(',');
                temp_unit_operator.pop();
                temp_unit_operation_value = (unit_operation_value[rowindex]).split(',');
                temp_unit_operation_value.pop();
                $('select[name="edit_unit"]').empty();
                $.each(temp_unit_name, function(key, value) {
                    $('select[name="edit_unit"]').append('<option value="' + key + '">' + value + '</option>');
                });
                $("#edit_unit").show();
            } else {
                row_product_price = product_price[rowindex];
                $("#edit_unit").hide();
            }
            $('input[name="edit_unit_price"]').val(row_product_price.toFixed({{ $general_setting->decimal }}));
            $('.selectpicker').selectpicker('refresh');
        }

        //Delete imei
        $(document).on("click", "table#imei-table tbody .imei-del", function() {
            $(this).closest("tr").remove();
            //decreaing qty
            var edit_qty = parseFloat($('input[name="edit_qty"]').val());
            $('input[name="edit_qty"]').val(edit_qty - 1);
        });

        function checkDiscount(qty, flag) {
            var customer_id = $('#customer_id').val();
            var warehouse_id = $('#warehouse_id').val();
            var product_id = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .product-id').val();
            if (flag) {
                $.ajax({
                    type: 'GET',
                    async: false,
                    url: '../sales/check-discount?qty=' + qty + '&customer_id=' + customer_id + '&product_id=' +
                        product_id + '&warehouse_id=' + warehouse_id,
                    success: function(data) {
                        console.log('data2213', data);
                        pos = product_code.indexOf($('table.order-list tbody tr:nth-child(' + (rowindex + 1) +
                            ') .product-code').val());
                        product_price[rowindex] = parseFloat(data[0] * currency['exchange_rate']) + parseFloat(
                            data[0] * currency['exchange_rate'] * customer_group_rate);
                    }
                });
            }
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(qty);
            checkQuantity(String(qty), flag);
        }

        function checkQuantity(sale_qty, flag) {
            var row_product_code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('td:nth-child(2)')
                .text();
            pos = product_code.indexOf(row_product_code);
            if (without_stock == 'no') {
                if (product_type[pos] == 'standard' || product_type[pos] == 'combo') {
                    var operator = unit_operator[rowindex].split(',');
                    var operation_value = unit_operation_value[rowindex].split(',');
                    if (operator[0] == '*')
                        total_qty = sale_qty * operation_value[0];
                    else if (operator[0] == '/')
                        total_qty = sale_qty / operation_value[0];
                    if (total_qty > parseFloat(product_qty[pos])) {
                        alert('Quantity exceeds stock quantity!');
                        if (flag) {
                            sale_qty = sale_qty.substring(0, sale_qty.length - 1);
                            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val(sale_qty);
                        } else {
                            edit();
                            return;
                        }
                    }
                }
                else if(product_type[pos] == 'combo'){
                    child_id = product_list[pos].split(',');
                    child_qty = qty_list[pos].split(',');
                    $(child_id).each(function(index) {
                        var position = product_id.indexOf(parseInt(child_id[index]));
                        if( position == -1 || parseFloat(sale_qty * child_qty[index]) > product_qty[position] ) {
                            alert('Quantity exceeds stock quantity!');
                            if (flag) {
                                sale_qty = sale_qty.substring(0, sale_qty.length - 1);
                                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val(sale_qty);
                            }
                            else {
                                edit();
                                flag = true;
                                return false;
                            }
                        }
                    });
                }
            }

            if (!flag) {
                $('#editModal').modal('hide');
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val(sale_qty);
            }
            calculateRowProductData(sale_qty);
        }

        function calculateRowProductData(quantity) {

            var code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.product-code').val();

            // $(".product-list tbody tr").each(function(index) {
            //     var rowCode = $(this).find("td:nth-child(2)").text().trim(); // Code column
            //     var rowQty = parseFloat($(this).find("td:nth-child(3)").text()
            //         .trim()); // Qty column
            //     if (rowCode == code && rowQty == quantity) {
            //         $(this)
            //             .find("#status")
            //             .removeClass("bg-danger")
            //             .addClass("bg-success")
            //             .text("Completed");
            //         $(`#product-status-${index}`).val("true");
            //     }

            //     if (rowCode == code && rowQty != quantity) {
            //         $(this)
            //             .find("#status")
            //             .removeClass("bg-success")
            //             .addClass("bg-danger")
            //             .text("Not-Completed");
            //         $(`#product-status-${index}`).val("false");

            //     }
            // });

            checkAllProduct();



            if (product_type[pos] == 'standard')
                unitConversion();
            else
                row_product_price = product_price[rowindex];

            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.discount').text((product_discount[
                rowindex] * quantity).toFixed({{ $general_setting->decimal }}));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.discount-value').val((product_discount[
                rowindex] * quantity).toFixed({{ $general_setting->decimal }}));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax-rate').val(tax_rate[rowindex]
                .toFixed({{ $general_setting->decimal }}));

            if (tax_method[rowindex] == 1) {
                var net_unit_price = row_product_price - product_discount[rowindex];
                var tax = net_unit_price * quantity * (tax_rate[rowindex] / 100);
                var sub_total = (net_unit_price * quantity) + tax;

                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.net_unit_price').text(net_unit_price
                    .toFixed({{ $general_setting->decimal }}));
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.net_unit_price').val(net_unit_price
                    .toFixed({{ $general_setting->decimal }}));
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax').text(tax.toFixed(
                    {{ $general_setting->decimal }}));
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax-value').val(tax.toFixed(
                    {{ $general_setting->decimal }}));
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.sub-total').text(sub_total.toFixed(
                    {{ $general_setting->decimal }}));
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.subtotal-value').val(sub_total
                    .toFixed({{ $general_setting->decimal }}));
            } else {
                var sub_total_unit = row_product_price - product_discount[rowindex];
                var net_unit_price = (100 / (100 + tax_rate[rowindex])) * sub_total_unit;
                var tax = (sub_total_unit - net_unit_price) * quantity;
                var sub_total = sub_total_unit * quantity;

                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.net_unit_price').text(net_unit_price
                    .toFixed({{ $general_setting->decimal }}));
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.net_unit_price').val(net_unit_price
                    .toFixed({{ $general_setting->decimal }}));
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax').text(tax.toFixed(
                    {{ $general_setting->decimal }}));
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax-value').val(tax.toFixed(
                    {{ $general_setting->decimal }}));
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.sub-total').text(sub_total.toFixed(
                    {{ $general_setting->decimal }}));
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.subtotal-value').val(sub_total
                    .toFixed({{ $general_setting->decimal }}));
            }

            calculateTotal();
        }

        function unitConversion() {
            var row_unit_operator = unit_operator[rowindex].slice(0, unit_operator[rowindex].indexOf(","));
            var row_unit_operation_value = unit_operation_value[rowindex].slice(0, unit_operation_value[rowindex].indexOf(
                ","));

            if (row_unit_operator == '*') {
                row_product_price = product_price[rowindex] * row_unit_operation_value;
            } else {
                row_product_price = product_price[rowindex] / row_unit_operation_value;
            }
        }


        $('#use_shipping_cost').change(function() {
            calculateTotal();
        });

        function calculateTotal() {
            //Sum of quantity
            var total_qty = 0;
            $(".qty").each(function() {
                if ($(this).val() == '') {
                    total_qty += 0;
                } else {
                    total_qty += parseFloat($(this).val());
                }
            });
            $("#total-qty").text(total_qty);
            $('input[name="total_qty"]').val(total_qty);

            //Sum of discount
            var total_discount = 0;
            $(".discount").each(function() {
                total_discount += parseFloat($(this).text());
            });
            $("#total-discount").text(total_discount.toFixed({{ $general_setting->decimal }}));
            $('input[name="total_discount"]').val(total_discount.toFixed({{ $general_setting->decimal }}));

            //Sum of tax
            var total_tax = 0;
            $(".tax").each(function() {
                total_tax += parseFloat($(this).text());
            });
            $("#total-tax").text(total_tax.toFixed({{ $general_setting->decimal }}));
            $('input[name="total_tax"]').val(total_tax.toFixed({{ $general_setting->decimal }}));

            //Sum of subtotal
            var total = 0;
            $(".sub-total").each(function() {
                total += parseFloat($(this).text());
            });
            $("#total").text(total.toFixed({{ $general_setting->decimal }}));
            $('input[name="total_price"]').val(total.toFixed({{ $general_setting->decimal }}));

            calculateGrandTotal();
        }


        function calculateGrandTotal() {

            var item = $('table.order-list tbody tr:last').index();
            var total_qty = parseFloat($('#total-qty').text());
            var subtotal = parseFloat($('#total').text());
            var order_tax = parseFloat($('select[name="order_tax_rate"]').val());


            // Check if the checkbox is checked
            if ($('#use_shipping_cost').is(':checked')) {
                var shipping_cost = parseFloat($('input[name="shipping_cost"]').val()) || 0;
            } else {
                var total_weight = 0;
                $('input[name="product_weight[]"]').each(function(index) {
                    var weight = parseFloat($(this).val()) || 0;
                    var qty = parseFloat($('.qty').eq(index).val()) || 0;
                    total_weight += weight * qty;
                });

                var shipping_cost_per_kg = 5; // Customize the shipping cost per kg as needed
                var shipping_cost = total_weight * shipping_cost_per_kg;

                if (currencyChange) {
                    shipping_cost *= currency['exchange_rate'];
                }
            }





            var order_discount_type = $('select[name="order_discount_type"]').val();
            var order_discount_value = parseFloat($('input[name="order_discount_value"]').val());
            if (!order_discount_value)
                order_discount_value = {{ number_format(0, $general_setting->decimal ) }};

            if (order_discount_type == 'Flat') {
                if (!currencyChange)
                    var order_discount = parseFloat(order_discount_value);
                else
                    var order_discount = parseFloat(order_discount_value * currency['exchange_rate']);
            } else
                var order_discount = parseFloat(subtotal * (order_discount_value / 100));

            if (!shipping_cost)
                shipping_cost = {{ number_format(0, $general_setting->decimal ) }};

            item = ++item + '(' + total_qty + ')';
            order_tax = (subtotal - order_discount) * (order_tax / 100);
            var grand_total = (subtotal + order_tax + shipping_cost) - order_discount;


            $('input[name="order_discount"]').val(order_discount);
            $('input[name="shipping_cost"]').val(shipping_cost.toFixed({{ $general_setting->decimal }}));
            $('#item').text(item);
            $('input[name="item"]').val($('table.order-list tbody tr:last').index() + 1);
            $('#subtotal').text(subtotal.toFixed({{ $general_setting->decimal }}));
            $('#order_tax').text(order_tax.toFixed({{ $general_setting->decimal }}));
            $('input[name="order_tax"]').val(order_tax.toFixed({{ $general_setting->decimal }}));
            $('#order_discount').text(order_discount.toFixed({{ $general_setting->decimal }}));
            $('#shipping_cost').text(shipping_cost.toFixed({{ $general_setting->decimal }}));
            $('#grand_total').text(grand_total.toFixed({{ $general_setting->decimal }}));
            if ($('select[name="payment_status"]').val() == 4) {
                $('#paying-amount').val('');
                $('#paid-amount').val(grand_total.toFixed({{ $general_setting->decimal }}));
            }
            $('input[name="grand_total"]').val(grand_total.toFixed({{ $general_setting->decimal }}));
            currencyChange = false;
        }

        function cancel(rownumber) {
            while (rownumber >= 0) {
                product_price.pop();
                wholesale_price.pop();
                product_discount.pop();
                tax_rate.pop();
                tax_name.pop();
                tax_method.pop();
                unit_name.pop();
                unit_operator.pop();
                unit_operation_value.pop();
                $('table.order-list tbody tr:last').remove();
                rownumber--;
            }
            $('input[name="shipping_cost"]').val('');
            $('input[name="order_discount_value"]').val('');
            $('select[name="order_tax_rate_select"]').val(0);
            calculateTotal();
        }



        $(window).keydown(function(e) {
            if (e.which == 13) {
                var $targ = $(e.target);
                if (!$targ.is("textarea") && !$targ.is(":button,:submit")) {
                    var focusNext = false;
                    $(this).find(":input:visible:not([disabled],[readonly]), a").each(function() {
                        if (this === e.target) {
                            focusNext = true;
                        } else if (focusNext) {
                            $(this).focus();
                            return false;
                        }
                    });
                    return false;
                }
            }
        });
    </script>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
@endpush
