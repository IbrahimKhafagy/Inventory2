@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--------------------------------- multipule upload images----------------------->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-------------------------------edit inline--------------------------------->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css"
        rel="stylesheet" />


    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
                                    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />-->
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Transfer products bet. inventories</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Transfer</span>
            </div>
        </div>


    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">


                    <h1 style="text-align: center">
                        <font color="#faab0c">Transfer</font>
                    </h1>
                    <h6>Please choose </h6>

                    <form action="" method="GET" data-parsley-validate="">
                        @csrf
                        <div class="row row-sm">

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">From Inventory (Name)</label>
                                    <select name="invn" placeholder="Enter Inventory_name" class="form-control">
                                        <option value="{{ Request::get('invn') }}">-- Select Inventory_name --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ Request::get('invn') == $product->inven->inv_name ? 'selected' : '' }}>
                                                {{ $product->inven->inv_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">To Inventory (Name) </label>
                                    <select name="invn2" placeholder="Enter Inventory_name" class="form-control">
                                        <option value="{{ Request::get('invn2') }}">-- Select Inventory_name --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->inven->inv_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>








                            <div class="col-6">
                                <div class="form-groupp">
                                    With <span class="tx-danger"></span>
                                    <input type="radio" name="per" id="1" value="1"> Barcode
                                    <input type="radio" name="per" id="2" value="2"> BIN
                                    <input type="radio" name="per" id="3" value="3"> Part_No

                                    <input type="text" class="form-control1" name="product_code"
                                        value="{{ Request::get('product_code') }}" style="display:none;"
                                        placeholder="Enter BarCode">
                                    <input type="text" class="form-control2" name="BIN"
                                        value="{{ Request::get('BIN') }}" style="display:none;" placeholder="Enter BIN">
                                    <input type="text" class="form-control3" name="Part_No"
                                        value="{{ Request::get('Part_No') }}" style="display:none;"
                                        placeholder="Enter Part_No">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Product (Name)<span class="tx-danger"> *</span> </label>
                                    <select name="Product_name" placeholder="Enter Product_name" class="form-control">
                                        <option value="{{ Request::get('keyword') }}">-- Select Product_name -- </option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->Product_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Category <span
                                            class="tx-danger"> *</span></label>
                                    <select name="categories_id" id="categories_id" class="form-control">
                                        <option value="" selected disabled> --Select Category--
                                        </option>
                                        @foreach ($cat as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->Category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="control-label">Subcategory <span class="tx-danger">
                                            *</span></label>
                                    <select id="Subcategory" name="Subcategory" class="form-control input-sm">
                                        <option value="" selected disabled> --Select SubCategory--
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Vendor <span class="tx-danger"> *</span></label>
                                    <select name="Vendor" id="vendor" class="form-control">
                                        <option value="" selected disabled> --Select Category--
                                        </option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ Request::get('Vendor') == $product->id ? 'selected' : '' }}>
                                                {{ $product->Vendor }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">QTY You need<span class="tx-danger">*</span></label>
                                    <input class="form-control" name="Supplier" value=""
                                        placeholder="Enter Supplier" type="text" readonly>
                                </div>
                                <div class="col-6">
                                </div>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">Search</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!------------------------End of Search------------------------------------------->

    <!------------------------Start of Form------------------------------------------->

    <!------------------------End of Search------------------------------------------->

    <!----------------------------The table of contacts------------------------------------------------------>

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Transaction Table</h4>



                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>
                            <tr class="table-success" style="text-align: center">

                                <th class="border-bottom-0">ID</th>
                                <th class="border-bottom-0">From Inventory</th>
                                <th class="border-bottom-0">To Inventory</th>
                                <th class="border-bottom-0">PRODUCT</th>
                                <th class="border-bottom-0">PART NO.</th>
                                <th class="border-bottom-0">VENDOR</th>
                                <th class="border-bottom-0">SUPPLIER</th>
                                <th class="border-bottom-0">BarCode</th>
                                <th class="border-bottom-0">BIN</th>
                                <th class="border-bottom-0">Stock QTY, Unit </th>
                                <th class="border-bottom-0">The deliver QTY</th>
                                <th class="border-bottom-0">CATEGORY</th>
                                <th class="border-bottom-0">SUBCATEGORY</th>
                                <th class="border-bottom-0">item Price</th>
                                <th class="border-bottom-0">Total Price</th>
                                <th class="border-bottom-0">Transfer Date</th>
                                <th class="border-bottom-0">Person Name</th>
                                <th class="border-bottom-0">ٍStatus</th>
                                <th class="border-bottom-0">Action</th>

                            </tr>
                        </thead>
                        <tbody>




                            @foreach ($products as $products)
                                <tr style="text-align: center" id="">
                                    <td>{{ $loop->iteration }}</td>
                                    <td value="{{ $products->id }}">{{ $product->inven->inv_name }}</td>
                                    <td value="{{ $products->id }}">{{ $product->inven->inv_name }}</td>
                                    <td>{{ $products->Product_name }}</td>
                                    <td>{{ $products->Part_No }}</td>
                                    <td>{{ $products->Vendor }}</td>
                                    <td>{{ $products->Supplier }}</td>
                                    <td>{{ $products->product_code }}</td>
                                    <td>{{ $products->BIN }}</td>
                                    <td>{{ number_format($products->QTY) }}</td>
                                    <td><a href="" class="update_record" data-name="Consumption" data-type="text"
                                            data-pk="{{ $products->id }}" data-title="Enter Consumption"></a>
                                    </td>
                                    <td>{{ $products->Categ->Category }}</td>
                                    <td>{{ $products->Subcat->Subcategory }}</td>
                                    <td>{{ number_format($products->Price, 2) }} {{ $products->curr->name }}</td>
                                    <td>{{ number_format($products->TotalPrice, 2) }} {{ $products->curr->name }}</td>
                                    <td>16/05/2023</td>
                                    <td>Mohamed{{ $products->Product_Manager }}</td>
                                    <td> Open(Not Approved)</td>
                                    <td>
                                        <a href="{{ route('confirm-trans', ['id' => $products->id]) }}"
                                            class="btn btn-success">Confirm</a>
                                        <a href="" class="btn btn-warning ">Edit</a>
                                        <a href="" class="btn btn-danger"> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>









                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                        <label class="btn btn-outline-primary"><a href="{{ route('AdSearch.AD') }}">Cancel</a></label>

                        <label class="btn btn-outline-primary"><a href="{{ route('trans.inv') }}">Add Anather
                                transfer</a></label>



                        <label class="btn btn-outline-primary"><a href="AllProducts"><a
                                    href='/inventory'>Back</a></label>
                    </div>
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" />

                    <!-- End Example Code -->
                </div>
            </div>
        </div>
    </div>









    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>

    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>

    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript">
        $("document").ready(function() {
            $('select[name="categories_id"]').on('change', function() {
                var catId = $(this).val();
                if (catId) {
                    $.ajax({
                        url: '/api/subcatories/' + catId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="Subcategory"]').empty();
                            $('select[name="Subcategory"]').append(
                                '<option value="" selected disabled> --Select SubCategory-- </option>'
                            );

                            $.each(data, function(key, value) {
                                $('select[name="Subcategory"]').append(
                                    '<option value=" ' + value['id'] + '">' + value[
                                        'Subcategory'] +
                                    '</option>');
                            })
                        }

                    })
                } else {
                    $('select[name="Subcategory"]').empty();
                }
            });


        });
    </script>


<script>
    // تحديد عنصري select الخاصين بـ "From Inventory" و "To Inventory"
    var fromInventorySelect = document.getElementsByName("invn")[0];
    var toInventorySelect = document.getElementsByName("invn2")[0];

    // إضافة حدث onchange إلى عنصر select الخاص بـ "From Inventory"
    fromInventorySelect.addEventListener("change", function() {
        // حذف الخيارات الحالية من عنصر select الخاص بـ "To Inventory"
        toInventorySelect.innerHTML = '<option value="">-- Select Inventory_name --</option>';

        // الحصول على القيمة المختارة في عنصر select الخاص بـ "From Inventory"
        var selectedFromInventory = this.value;

        // إنشاء قائمة للخيارات المستبعدة من عنصر select الخاص بـ "To Inventory"
        var excludedOptions = [];

        // إضافة الخيارات المختارة في عنصر select الخاص بـ "From Inventory" إلى قائمة الخيارات المستبعدة
        for (var i = 0; i < fromInventorySelect.options.length; i++) {
            if (fromInventorySelect.options[i].value !== "" && fromInventorySelect.options[i].value !== selectedFromInventory) {
                excludedOptions.push(fromInventorySelect.options[i].value);
            }
        }

        // إضافة الخيارات الجديدة إلى عنصر select الخاص بـ "To Inventory"
        @foreach ($products as $product)
            @if (isset($product->inven) && $product instanceof \App\Product && !in_array($product->inven->inv_name, $excludedOptions) && $product->inven->inv_name !== $selectedFromInventory)
                <option value="{{ $product->id }}">{{ $product->inven->inv_name }}</option>
            @endif
        @endforeach
    });
</script>


    <script>
        // استهدف جميع الـ radio buttons التي لديها name="per"
        var radios = document.getElementsByName("per");

        // استهدف جميع الـ inputs
        var inputs = document.querySelectorAll('.form-groupp input[type="text"]');

        // اضف استماع لحدث onchange لجميع الـ radio buttons
        for (var i = 0; i < radios.length; i++) {
            radios[i].addEventListener('change', function() {
                var selectedValue = this.value; // القيمة المحددة للـ radio button

                // اخفِ جميع الـ inputs
                for (var j = 0; j < inputs.length; j++) {
                    inputs[j].style.display = 'none';
                }

                // استهدف الـ input المناسب واعرضه
                var selectedInput = document.querySelector('.form-groupp .form-control' + selectedValue);
                if (selectedInput !== null) {
                    selectedInput.style.display = 'block';
                }
            });
        }
    </script>






    <script type="text/javascript">
        $("document").ready(function() {
            $('select[name="Category"]').on('change', function() {
                var catId = $(this).val();
                if (catId) {
                    $.ajax({
                        url: '/api/subcatories/' + catId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="Subcategory"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="Subcategory"]').append(
                                    '<option value=" ' + value['id'] + '">' + value[
                                        'Subcategory'] +
                                    '</option>');
                            })
                        }

                    })
                } else {
                    $('select[name="Subcategory"]').empty();
                }
            });


        });
    </script>


    <!----------------------- edit inline ajax---------------------------------------->



    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $.fn.poshytip = {
            defaults: null
        }
    </script>



    <script type="text/javascript">
        $.fn.editable.defaults.mode = 'inline';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('.update_record').editable({
            url: "{{ route('Product.updateAjex1') }}",
            type: 'text',
            name: 'Product_name',
            pk: 1,
            title: 'Enter Field'





        });
    </script>
    <!------------------------ The new Stock =QTY -consumption QTY---------------------------->
    <script>
        function myFunction() {
            var QTY = parseFloat(document.getElementById("QTY").value);
            var Consumption = parseFloat(document.getElementById("Consumption").value);
            var Result = parseFloat(document.getElementById("QTY").value);

            var Result = QTY - Consumption;

            if (typeof QTY === 'undefined' || !QTY) {

                alert('Please, Enter the QTY');

            } else {

                var Result = QTY - Consumption;
                sumq = parseFloat(Result).toFixed(2);
                document.getElementById("QTY").value = sumq;



            }
        }
    </script>

    <!----------------------------------------------Call Subcategory from Category--------------------------------------------------------------------->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript">
        $("document").ready(function() {
            $('select[name="categories_id"]').on('change', function() {
                var catId = $(this).val();
                if (catId) {
                    $.ajax({
                        url: '/api/subcatories/' + catId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="Subcategory"]').empty();
                            $('select[name="Subcategory"]').append(
                                '<option value="" selected disabled> --Select SubCategory-- </option>'
                            );

                            $.each(data, function(key, value) {
                                $('select[name="Subcategory"]').append(
                                    '<option value=" ' + value['id'] + '">' + value[
                                        'Subcategory'] +
                                    '</option>');
                            })
                        }

                    })
                } else {
                    $('select[name="Subcategory"]').empty();
                }
            });


        });

        function myFunction() {
            var Reorder_QTY = parseFloat(document.getElementById("QTY").value);
            var Price = parseFloat(document.getElementById("Price").value);
            var TotalPrice = parseFloat(document.getElementById("TotalPrice").value);

            var TotalPrice = Reorder_QTY * Price;

            if (typeof Reorder_QTY === 'undefined' || !Reorder_QTY) {

                alert('Please, Enter the Reorder_QTY');

            } else {

                var result = Reorder_QTY * Price;
                sumq = parseFloat(result).toFixed(2);
                document.getElementById("TotalPrice").value = sumq;



            }

            function ExpectedDate() {

                var Reorder_Date = dataType(document.getElementById("Reorder_Date").value);
                var delivery_time = Date(document.getElementById("delivery_time").value);
                var Expected_Date = (Reorder_Date + delivery_time);

            }

        }
    </script>





    <!-------------------------------------------------dependent drop lists--------------------------------------->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#inventory-dd').on('change', function() {
                var idInventory = this.value;
                $("#products-dd").html('');
                $("#QTY-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-Products') }}",
                    type: "POST",
                    data: {
                        inventory_id: idInventory,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#products-dd').html('<option value="">Select products</option>');

                        $.each(result.products, function(key, value) {
                            $("#products-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#QTY-dd').html('<option value="">Select QTY</option>');
                        $.each(result.products, function(key, value) {
                            $("#QTY-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#Category-dd').html('<option value="">Select Category</option>');
                    }
                });
            });
            $('#products-dd').on('change', function() {
                var idProducts = this.value;
                $("#Category-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-Categories') }}",
                    type: "POST",
                    data: {
                        products_id: idProducts,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#Category-dd').html('<option value="">Select Category</option>');
                        $.each(res.categories, function(key, value) {
                            $("#Category-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });


        });
    </script>
@endsection
