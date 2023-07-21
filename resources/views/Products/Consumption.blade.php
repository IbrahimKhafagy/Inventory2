@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Inventory</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Consumption</span>
            </div>
        </div>


    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    <!-- row -->
    <div class="row">


        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">


                    <h1 style="text-align: center">
                        <font color="#faab0c">Consumption</font>
                    </h1>
                    <h6>use one or more information about the product that you want to search about</h6>

                    <form action="" method="GET" data-parsley-validate="">

                        @csrf
                        <div class="row row-sm">
                            <div class="col-2" style="color: green">
                                <label for="exampleInputEmail1">Inventory-name</label>
                                <select name="inventory_id" id="inventory_id" class="form-control">
                                    <option value="" selected disabled> --Select inventory name--
                                    </option>
                                    @foreach ($inv as $inv)
                                        <option value="{{ $inv->id }}">{{ $inv->inv_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">Product </label>

                                    <input class="form-control" name="keyword" placeholder="Enter Product_name" type="text" value="{{Request::get('keyword')}}">
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Part_No </label>
                                    <input class="form-control" name="Part_No" placeholder="Enter Part_No" id="Part_No"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Category </label>
                                    <select name="Category" id="Category" class="form-control">
                                        <option value="" selected disabled> -- Select the Category Name--
                                        </option>
                                        @foreach ($cat as $cat)
                                            <option value="{{ $cat->id }}" {{(Request::get('Category') == $cat->id) ? 'selected' : ''}}>{{ $cat->Category }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Vendor </label>
                                    <input class="form-control" name="Vendor" id="Vendor" placeholder="Enter Vendor"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">subcategory</label>
                                    <select id="Subcategory" name="Subcategory" class="form-control input-sm"
                                        id="Subcategory">
                                    </select>
                                </div>
                            </div>


                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10"
                                    type="submit">Search</button></div>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <!------------------------End of Search------------------------------------------->


    <!----------------------------The table of contacts------------------------------------------------------>

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Products Table</h4>



                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!-- All the contact Type Code -->

                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>
                            <tr class="table-success" style="text-align: center">
                                <td><input type="checkbox" name="product" id="product"></td>

                                <th class="border-bottom-0">ID</th>

                                <th class="border-bottom-0">Inventory name</th>
                                <th class="border-bottom-0">PRODUCT</th>
                                <th class="border-bottom-0">PART NO.</th>
                                <th class="border-bottom-0">VENDOR</th>
                                <th class="border-bottom-0">SUPPLIER</th>
                                <th class="border-bottom-0">Consumption</th>
                                <th class="border-bottom-0">Stock QTY</th>
                                <th class="border-bottom-0">CATEGORY</th>
                                <th class="border-bottom-0">SUBCATEGORY</th>
                                <th class="border-bottom-0">Unit</th>
                                <th class="border-bottom-0">Location</th>
                                <th class="border-bottom-0">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($products))
                                <?php $i = 0; ?>

                                @foreach ($products as $products)
                                    <?php $i++; ?>
                                    <tr style="text-align: center" id="tr_{{ $products->id }}">
                                        <td><input type="checkbox" class="sub_chk" data-id="{{ $products->id }}"></td>
                                        <td>{{ $i }}</td>

                                        <td>{{ $products->inven->inv_name }}</td>
                                        <td>{{ $products->Product_name }}</td>
                                        <td>{{ $products->Part_No }}</td>
                                        <td>{{ $products->Vendor }}</td>
                                        <td>{{ $products->Supplier }}</td>

                                        <td><a href="" class="update_record" data-name="Consumption" data-type="text"
                                            data-pk="{{ $products->id }}"
                                            data-title="Enter Consumption"></a>
                                        </td>
                                        <td>{{ $products->QTY }}</td>
                                        <td>{{ $products->Categ->Category }}</td>
                                        <td>{{ $products->Subcat->Subcategory }}</td>
                                        <td>{{ $products->uni->unit_name }}</td>

                                        <td>{{ $products->Location }}</td>
                                        <td>
                                            <a href="product-show/{{ $products->id }}" class="btn btn-success">View</a>
                                            <a href="productedit/{{ $products->id }}" class="btn btn-warning ">Edit</a>
                                            <a href="DeleteProduct/{{ $products->id }}" class="btn btn-danger">
                                                Delete</a>

                                        </td>

                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </form>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                    <label class="btn btn-outline-primary" ><a
                            href="{{ route('AdSearch.AD') }}">Cancel</a></label>

                    <label class="btn btn-outline-primary" ><a
                            href="{{ route('add.product') }}">Create</a></label>



                    <label class="btn btn-outline-primary" ><a href="AllProducts"><a
                                href='/inventory'>Back</a></label>
                </div>
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" />
                    <a class="btn btn-danger" for="btnradio3" data-url="{{ url('inventoryDeleteAll') }}">Delete
                        Selected</a>
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
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>





    <!-------------------------------------------multi delete------------------------------------------------------------------>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js">
    </script>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="plugins/Jquery-Table-Check-All/dist/TableCheckAll.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });

            $('.delete_all').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });
                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var check = confirm("Are you sure you want to delete this row?");
                    if (check == true) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + join_selected_values,
                            success: function(data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });
                        $.each(allVals, function(index, value) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function(event, element) {
                    element.trigger('confirm');
                }
            });
            $(document).on('confirm', function(e) {
                var ele = e.target;
                e.preventDefault();
                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function(data) {
                        alert(data.responseText);
                    }
                });
                return false;
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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



<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>$.fn.poshytip={defaults:null}</script>



<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': '{{csrf_token()}}'
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
@endsection
