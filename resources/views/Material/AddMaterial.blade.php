@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">

    <!-------------------------------------------- date calendar---------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">lists</h4><span class="text mt-1 tx-13 mr-2 mb-0">/
                    Materials</span><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Add</span>
            </div>
        </div>


    </div>


    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 col-md-12">
                        <div class="container">






                            <div class="modal-body">
                                <form action="{{ route('submit.material') }}" method="post" autocomplete="off"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row row-sm">


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">material_name</label>
                                            <input type="text" class="form-control" id="material_name"
                                                name="material_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Co_name</label>
                                            <input type="text" class="form-control" id="Co_name" name="Co_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Part_No</label>
                                            <input type="text" class="form-control" id="Part_No" name="Part_No">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vendor</label>
                                            <input type="text" class="form-control" id="Vendor" name="Vendor">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Supplier</label>
                                            <input type="text" class="form-control" id="Supplier" name="Supplier">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Unit:</label>
                                            <br>
                                            <select name="Unit" id="Unit">
                                                <option value="piece">piece</option>
                                                <option value="Meter">Meter</option>
                                                <option value="Kilogram">Kilogram</option>
                                                <option value="Litre">Litre</option>
                                                <option value="Litre">other</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">+add unit</label>
                                            <input type="text" class="form-control" id="add" name="add">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">BIN</label>
                                            <br>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                <option selected>auto</option>
                                                <option value="1">input value</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">BIN</label>
                                            <input type="text" class="form-control" id="BIN" name="BIN">
                                        </div>


                                        <div class="col">
                                            <label for="inputName" class="control-label">Consumption_Rate</label>
                                            <input type="text" class="form-control form-control-lg" id="Consumption_Rate"
                                                name="Consumption_Rate" title="Total Cost for Stock-QTY"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                value=0 required>
                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputEmail1">
                                                per
                                            </label>

                                            <br>

                                            Day<input type="checkbox" name="per" id="day" class="c"
                                                value="Day">
                                            Week <input type="checkbox" name="per" id="week" class="c"
                                                value="Week">
                                            Month <input type="checkbox" name="per" id="month" class="c"
                                                value="Month">
                                            Year <input type="checkbox" name="per" id="year" class="c"
                                                value="Year">


                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputEmail1">SKU</label>
                                            <input type="text" class="form-control" id="SKU" name="SKU">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Location</label>
                                            <input type="text" class="form-control" id="Location" name="Location">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="inputName" class="control-label">Category</label>
                                                <select name="Category" class="form-control SlectBox" id="Category">

                                                    <!--placeholder-->
                                                    <option value="" selected disabled>Select the category </option>
                                                    @foreach ($cat as $cat)
                                                        <option value="{{ $cat->id }}"> {{ $cat->Category }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <label for="inputName" class="control-label">Subcategory</label>
                                            <select id="Subcategory" name="Subcategory" class="form-control input-sm">
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Other_Features</label>
                                            <input type="text" class="form-control" id="Other_Features"
                                                name="Other_Features">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Reorder_Date</label>
                                            <input type="text" class="date form-control" id="Reorder_Date"
                                                name="Reorder_Date" placeholder="YYYY-MM-DD">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pro_cate_Manager</label>
                                            <input type="text" class="form-control" id="Pro_cate_Manager"
                                                name="Pro_cate_Manager">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product_Manager</label>
                                            <input type="text" class="form-control" id="Product_Manager"
                                                name="Product_Manager">
                                        </div>

                                        <div class="col">
                                            <label for="inputName" class="control-label">Order_QTY</label>
                                            <input type="text" class="form-control form-control-lg" id="Order_QTY"
                                                name="Order_QTY" onblur="myFunction()" title="Total Cost for Stock-QTY"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                value=0 required>
                                        </div>

                                        <div class="col">
                                            <label for="inputName" class="control-label">Price</label>
                                            <input type="text" class="form-control form-control-lg" id="Price"
                                                name="Price" onblur="myFunction()" title="Total Cost for one item"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                value=0 required>
                                        </div>

                                        <div class="col">
                                            <label for="inputName" class="control-label">Total_price</label>
                                            <input type="text" class="form-control" id="Total_price"
                                                name="Total_price" data-height="70" readonly>
                                        </div>



                                        <div class="col">
                                            <label for="inputName" class="control-label">Stock_QTY</label>
                                            <input type="text" class="form-control form-control-lg" id="Stock_QTY"
                                                name="Stock_QTY" title="Total Cost for Stock-QTY"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                value=0 required>
                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputEmail1">
                                                <h5>Availibilty</h5>
                                            </label><br>
                                            <input type="checkbox" name="Availibilty" id="Yes" value="Yes">Yes
                                            <input type="checkbox" name="Availibilty" id="No" value="No">No

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <label for="exampleTextarea">Description</label>
                                                <textarea class="form-control" id="exampleTextarea" name="Description" rows="3"></textarea>
                                            </div>
                                        </div><br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="card-title">
                                            <div class="col-sm-12 col-md-12">
                                                <p class="text-danger" style="text-align: right">* صيغة المرفق pdf, jpeg
                                                    ,.jpg ,
                                                    png,.xlx, .csv, .gif, .svg
                                                </p>
                                            </div>
                                        </div>
                                        <br> <br>
                                        <br>
                                        <h5 class="card-title">Attached File/Photos</h5>
                                        <br>
                                        <br>
                                        <div class="col-sm-12 col-md-12">
                                            <label for="inputFile">Select Files:</label>
                                            <input type="file" name="cataloge" id="inputFile" multiple
                                                class="dropify  @error('files') is-invalid @enderror"
                                                accept=".pdf,.jpg, .png, image/jpeg, image/png, .xlx, .csv, .gif, .svg"
                                                data-height="70">

                                            @error('files')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Confirm</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </form>




                            </div>

                        </div>


                    </div>
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
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <!----------------------------------------------------date calendar----------------------------------------------------------------------------->
    <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>


    <!----------------------------------------------Call Subcategory from Category--------------------------------------------------------------------->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript">
        $("document").ready(function() {
            $('select[name="Category"]').on('change', function() {
                var catId = $(this).val();
                if (catId) {
                    $.ajax({
                        url: '/subcatories/' + catId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="Subcategory"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="Subcategory"]').append(
                                    '<option value=" ' + key + '">' + value +
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


    <!----------------------------------------------The Math--------------------------------------------------------------------->

    <script>
        function myFunction() {
            var Order_QTY = parseFloat(document.getElementById("Order_QTY").value);
            var Price = parseFloat(document.getElementById("Price").value);
            var Total_price = parseFloat(document.getElementById("Total_price").value);

            var Total_price = Order_QTY * Price;

            if (typeof Order_QTY === 'undefined' || !Order_QTY) {

                alert('Please, Enter the Order_Qty');

            } else {

                var result = Order_QTY * Price;
                sumq = parseFloat(result).toFixed(2);
                document.getElementById("Total_price").value = sumq;



            }


        }
    </script>
@endsection
