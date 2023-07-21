@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">inventory</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Edit</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 col-md-12">

                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <div class="col-lg-12 col-md-12">

                            <div class="modal-body">
                                <form action="/updateproduct/{{ $products->id }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row row-sm">
                                        <input type="hidden" value="{{ $products->id }}" name="id" readonly>

                                        <div class="form-group">
                                            <div class="form-group" style="color: green">
                                                <label for="exampleInputEmail1">Inventory-name</label>
                                                <select name="inventory_id" id="inventory_id" class="form-control" required>
                                                    <option value="" selected disabled> --Select inventory name--
                                                    </option>
                                                    @foreach ($inv as $inv)
                                                        @if ($inv->id == $products->inventory_id)
                                                            <option value="{{ $inv->id }}" selected>
                                                                {{ $inv->inv_name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $inv->id }}">{{ $inv->inv_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>







                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product_name <span class="tx-danger">
                                                    *</span></label>
                                            <input type="text" class="form-control" id="Product_name" name="Product_name"
                                                value="{{ $products->Product_name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Part_No</label>
                                            <input type="text" class="form-control" id="Part_No" name="Part_No"
                                                value="{{ $products->Part_No }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vendor</label>
                                            <input type="text" class="form-control" id="Vendor" name="Vendor"
                                                value="{{ $products->Vendor }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Supplier</label>
                                            <input type="text" class="form-control" id="Supplier" name="Supplier"
                                                value="{{ $products->Supplier }}">
                                        </div>
                                        {{-- -  @can('sku-list')
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">SKU</label>
                                                <input type="text" class="form-control" id="SKU" name="SKU">
                                            </div>
                                        @endcan --}}
                                        <!------------------------------------------------------------------------------------------------------------->
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">BIN :
                                            </label>

                                            <input type="text" name="BIN" class="form-control"
                                                value="{{ $products->BIN }}">
                                        </div>

                                        <!----------------------------BarCode------------------->
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">product_code :</label>

                                            <input type="text" name="product_code" class="form-control"
                                                value="{{ $products->product_code }}">


                                        </div>







                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Location</label>
                                            <input type="text" class="form-control" id="Location" name="Location"
                                                value="{{ $products->Location }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">unit <span
                                                    class="tx-danger"> *</span></label>
                                            <select name="unit_id" id="unit_id" class="form-control" required>
                                                <option value="" selected disabled> --Select unit--
                                                </option>
                                                @foreach ($un as $un)
                                                    @if ($un->id == $products->unit_id)
                                                        <option value="{{ $un->id }}" selected>{{ $un->unit_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $un->id }}">{{ $un->unit_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <a class="modal-effect btn btn-outline-primary btn-sm"
                                                data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> Add
                                                Unit</a>
                                        </div>
                                        <!--------------------------------------------------------------------------------------------------------------->
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Product
                                                Type <span class="tx-danger"> *</span></label>
                                            <select name="productype_id" id="productype_id" class="form-control"
                                                required>
                                                <option value="" selected disabled> --Select Product Type--</option>
                                                @foreach ($pt as $ppp)
                                                    @if ($ppp->id == $products->productype_id)
                                                        <option value="{{ $ppp->id }}" selected>{{ $ppp->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $ppp->id }}">{{ $ppp->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Category <span
                                                    class="tx-danger"> *</span></label>
                                            <select name="categories_id" id="categories_id" class="form-control"
                                                required>
                                                <option value="" selected disabled> --Select Category--
                                                </option>
                                                @foreach ($cat as $cat)
                                                    @if ($cat->id == $products->categories_id)
                                                        <option value="{{ $cat->id }}" selected>{{ $cat->Category }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $cat->id }}">{{ $cat->Category }}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="control-label">Subcategory <span
                                                    class="tx-danger"> *</span></label>
                                            <select id="Subcategory" name="Subcategory" class="form-control input-sm">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Other_Features</label>
                                            <input type="text" class="form-control" id="Other_Features"
                                                name="Other_Features" value="{{ $products->Other_Features }}">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">QTY <span class="tx-danger"> *</span></label>
                                            <input type="text" class="form-control" id="QTY" name="QTY"
                                                value="{{ $products->QTY }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="control-label">Unit Price <span
                                                    class="tx-danger">
                                                    *</span></label>
                                            <input type="text" class="form-control form-control-lg" id="Price"
                                                name="Price" onblur="myFunction()" title="Total Cost for one item"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                value="{{ $products->Price }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="control-label">Total price</label>
                                            <input type="text" class="form-control" id="TotalPrice" name="TotalPrice"
                                                readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Reorder_Point <span class="tx-danger">
                                                    *</span></label>
                                            <input type="text" class="date form-control" id="Reorder_QTY"
                                                name="Reorder_QTY" value="{{ $products->Reorder_QTY }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Currancy <span
                                                    class="tx-danger"> *</span></label>
                                            <select name="currancy_id" id="currancy_id" class="form-control" required>
                                                <option value="" disabled> --Select Currancy--
                                                </option>
                                                @foreach ($cr as $cr)
                                                    @if ($cr->id == $products->currancy_id)
                                                        <option value="{{ $cr->id }}" selected>{{ $cr->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $cr->id }}">{{ $cr->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName" class="control-label">Consumption_Rate <span
                                                    class="tx-danger"> *</span></label>
                                            <input type="text" class="form-control form-control-lg"
                                                id="Consumption_Rate" name="Consumption_Rate" required
                                                value="{{ $products->Consumption_Rate }}">
                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputEmail1">
                                                per<span class="tx-danger"> *</span>: {{ $products->per }}
                                            </label>

                                            <br>

                                            <input type="radio" name="per" id="day" class="c"
                                                value="Day">Day
                                            <input type="radio" name="per" id="week" class="c"
                                                value="Week"> Week
                                            <input type="radio" name="per" id="month" class="c"
                                                value="Month">Month
                                            <input type="radio" name="per" id="year" class="c"
                                                value="Year"> Year


                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">delivery_time <span class="tx-danger">
                                                    *</span></label>
                                            <input type="number" class="date form-control" id="delivery_time"
                                                name="delivery_time" value="{{ $products->delivery_time }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">
                                                per<span class="tx-danger"> *</span> : {{ $products->per1 }}
                                            </label>

                                            <br>
                                            <input type="radio" name="per1" id="day" value="Day"> Day
                                            <input type="radio" name="per1" id="week" value="Week">Week
                                            <input type="radio" name="per1" id="month" value="Month"> Month
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Reorder_Date</label>
                                            <input type="text" class="date form-control" id="Reorder_Date"
                                                name="Reorder_Date" placeholder="YYYY-MM-DD"
                                                value="{{ $products->Reorder_Date }}" readonly>
                                        </div>






                                        <div class="form-group">
                                            <label for="exampleInputEmail1">
                                                Availbility :{{ $products->Availbility }}
                                            </label><br>
                                            <input type="radio" name="Availbility" id="Yes" value="Yes">Yes
                                            <input type="radio" name="Availbility" id="No" value="No">No

                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <label for="floatingTextarea2">Description</label>
                                            <textarea class="form-control" placeholder="Leave a Description here" id="floatingTextarea2" style="height: 100px">{{ $products->Description }}</textarea>

                                        </div>


                                        <br><br>
                                        <div class="form-group"  style="color: green">
                                            <h5>Extra Edit :</h5>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Cost
                                            </label>
                                            <input type="text" class="form-control" id="Cost" name="Cost"
                                                value="{{ $products->Cost }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product_Manager </label>
                                            <input type="text" class="form-control" id="Product_Manager"
                                                name="Product_Manager" value="{{ $products->Product_Manager }}">
                                        </div>


                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">


                                            <label class="m-2">Cover Image</label>
                                            <input type="file" id="input-file-now-custom-3" class="form-control m-2"
                                                name="cover">

                                            <p class="text-danger" style="text-align: right">* attached format
                                                pdf, jpeg ,.jpg ,
                                                png,.xlx, .csv, .gif, .svg
                                            </p>
                                            <label class="m-2">Images</label>
                                            <input type="file" id="input-file-now-custom-3" class="form-control m-2"
                                                name="images[]" multiple>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update

                                        </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a
                                                href="{{ route('inventory.index') }}">Close
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>








                        <div class="col-lg-3">

                            <p>Cover:</p>
                            <form action="/deletecover/{{ $products->id }}" method="post">
                                <button class="btn text-danger">X</button>
                                @csrf
                                @method('delete')
                            </form>
                            <img src="/cover/{{ $products->cover }}" class="img-responsive"
                                style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                            <br>





                        </div>




                        <!---------------------------------------------------------------------------------------->




                    </div>












                </div>


            </div>
        </div>

    </div>






    <!-------------------------The action of model ajax--------------->

    <div class="modal" id="modaldemo8">


        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add New Unit</h6><button aria-label="Close" class="Close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>


                <!---The inputs of the form --------------------------------------->


                <div class="modal-body">
                    <form action="{{ route('Unit.store') }}" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="card-body pt-0">


                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Unit</label>
                                <input type="text" class="form-control" id="unit_name" name="unit_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="Description" name="Description" rows="3"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Confirm</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </form>


                </div>

            </div>
        </div>
    </div>


    @if (Session::has('message'))
        <script>
            swal("Message", "{{ Session::get('message') }}", 'success', {
                button: true,
                button: "ok",
                timer: 3000,
                dangerMode: true,
            });
        </script>
    @endif

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
     <!---- sweet alart --->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
         integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <!------- JQuery--Input-BIN----------------------->

    <script type="text/javascript">
        function changelist() {

            if ($(document.getElementsByName('list_mask_0')).val() == 'BIN') {
                $(document.getElementsByName('list_text_0')).prop('disabled', false);
                // $(document.getElementsByName('list_text_0')).removeAttr("disabled");
            } else {
                $(document.getElementsByName('list_text_0')).prop('disabled', true);
            }
        }
    </script>




    <!------- JQuery--Input-Bare-code/product code----------------------->

    <script type="text/javascript">
        function changelist1() {

            if ($(document.getElementsByName('list_mask_1')).val() == 'product_code') {
                $(document.getElementsByName('list_text_1')).prop('disabled', false);
                // $(document.getElementsByName('list_text_1')).removeAttr("disabled");
            } else {
                $(document.getElementsByName('list_text_1')).prop('disabled', true);
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
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- <script>
        @if (Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script> --}}
      <!---------------------------- sweet alart-------->
    @if (Session::has('message'))
    <script>
        swal("Message", "{{ Session::get('message') }}", 'success', {
            button: true,
            button: "ok",
            timer: 3000,
            dangerMode: true,
        });
    </script>
@endif
@endsection
