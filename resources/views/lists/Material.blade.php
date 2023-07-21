@extends('layouts.master')


@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--------------------------multi delete---------------->
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Lists</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   Materials</span>

            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <!-----------------------------multi delete------------------------------------------------------------------------->

        @if (Session::get('success', false))
            <?php $data = Session::get('success'); ?>
            @if (is_array($data))
                @foreach ($data as $msg)
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-check"></i>
                        {{ $msg }}
                    </div>
                @endforeach
            @else
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check"></i>
                    {{ $data }}
                </div>
            @endif
        @endif




        <!------------------------------------------------------------------------------------------------------>
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                    <img src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="sign-favicon ht-40" alt="logo">
                    <h2> Product Type : Materials</h2>
                    <div class="d-flex justify-content-between">

                        <a class="btn btn-danger delete_all" data-url="{{ url('inventoryDeleteAll') }}">Delete All
                            Selected</a>
                        <!----The btn of model of add categery with ajax---->
                        <div class="col-sm-6 col-md-4 col-xl-3">

                            <a class="modal-effect btn btn-outline-primary btn-block" href="{{ route('add.product') }}">
                                Create Product</a>

                        </div>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>





                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr class="table-success" style="text-align: center">
                                    <th scope="col"><input type="checkbox" id="master"></th>
                                    <th class="border-bottom-0">id</th>
                                    <th class="border-bottom-0">product</th>
                                    @can('show-companyname')
                                        <th class="border-bottom-0">Company_name</th>
                                    @endcan
                                    <th class="border-bottom-0">Part_No</th>
                                    <th class="border-bottom-0">Vendor</th>
                                    <th class="border-bottom-0">Supplier</th>
                                    <th class="border-bottom-0">Unit</th>

                                    <th class="border-bottom-0">BIN</th>


                                    <th class="border-bottom-0">Qty</th>
                                    <th class="border-bottom-0">Reorder_QTY</th>
                                    <th class="border-bottom-0">Consumption_Rate</th>
                                    <!--<th class="border-bottom-0">per</th>-->
                                    @can('price')
                                        <th class="border-bottom-0">Price</th>
                                    @endcan
                                    <th class="border-bottom-0">Currancy</th>
                                    <th class="border-bottom-0">type</th>

                                    <th class="border-bottom-0">Location</th>
                                    <th class="border-bottom-0">Category</th>
                                    <th class="border-bottom-0">Subcategory</th>
                                    <th class="border-bottom-0">Reorder_Date</th>
                                    @can('Chainnest_Price')
                                        <th class="border-bottom-0">Chainnest_Price</th>
                                    @endcan
                                    <th class="border-bottom-0">Availbility</th>
                                    <th class="border-bottom-0">Ask For Quotation</th>
                                    <th class="border-bottom-0"> Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($products as $key => $products)
                                    <?php $i++; ?>
                                    <tr style="text-align: center" id="tr_{{ $products->id }}">

                                        <td><input type="checkbox" class="sub_chk" data-id="{{ $products->id }}"></td>
                                        <td>{{ $i }}</td>
                                        <td>
                                            <a href="" class="update" data-name="Product_name" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Product_name }}</a>
                                        </td>

                                        {{-- @can('show-companyname')

                                            <td>

                                            <a href="" class="update" data-name="Co_name" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Co_name }}</a>
                                        </td>
                                        @endcan
                                                   --}}
                                        @can('show-companyname')
                                            <td>{{ $products->Com->Company_name }}</td>
                                        @endcan
                                        <td>
                                            <a href="" class="update" data-name="Part_No" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Part_No }}</a>
                                        </td>


                                        <td>
                                            <a href="" class="update" data-name="Vendor" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Vendor }}</a>
                                        </td>


                                        <td>
                                            <a href="" class="update" data-name="Supplier" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Supplier }}</a>
                                        </td>
                                        <td>
                                            <a href="" class="update" data-name="unit_name" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->uni->unit_name }}</a>
                                        </td>
                                        {{-- <td></td> --}}

                                        <td>
                                            <a href="" class="update" data-name="BIN" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->BIN }} </a>
                                        </td>
                                        <td>
                                            <a href="" class="update" data-name="QTY" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->QTY }}</a>
                                        </td>
                                        <td>
                                            <a href="" class="update" data-name="Reorder_QTY" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Reorder_QTY }}</a>
                                        </td>

                                        <td>
                                            <a href="" class="update" data-name="Consumption_Rate"
                                                data-type="text" data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Consumption_Rate }}{{ $products->per }}</a>
                                        </td>
                                        <!--<td>
                                            {{ $products->per }}
                                        </td>-->
                                        @can('price')
                                            <td>
                                                <a href="" class="update" data-name="Price" data-type="text"
                                                    data-pk="{{ $products->id }}"
                                                    data-title="Enter name">{{ $products->Price }}</a>
                                            </td>
                                        @endcan
                                        <!------------------------------------------------------------->

                                        <td>{{ $products->curr->name }}</td>


                                        <td>{{ $products->type->name }}</td>

                                        {{--
                                           @can('sku-list')
                                            <td>
                                            <a href="" class="update" data-name="SKU" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->SKU }}</a>

                                        </td>
                                        @endcan
                                        --}}

                                        <td>
                                            <a href="" class="update" data-name="Location" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Location }}</a>
                                        </td>

                                        <td>{{ $products->Categ->Category }}</td>
                                        <td>{{ $products->Subcat->Subcategory }}</td>

                                        <td>
                                            <a href="" class="update" data-name="Reorder_Date" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Reorder_Date }}</a>
                                        </td>

                                        @can('Chainnest_Price')
                                            <td>Chain Nest</td>
                                        @endcan
                                        <td>
                                            <a href="" class="update" data-name="Availbility" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Availbility }}</a>
                                        </td>

                                        <td> <a href="" class="btn btn-secondary ">Ask For Quotation </a></td>






                                        <td>
                                            @can('product-show')
                                                <a href="product-show/{{ $products->id }}" class="btn btn-success">View </a>
                                            @endcan

                                            @can('product-edit')
                                                <a href="productedit/{{ $products->id }}" class="btn btn-warning ">Edit </a>
                                            @endcan

                                                @can('product-delete')
                                                    <a href="DeleteProduct/{{ $products->id }}" class="btn btn-danger"
                                                        data-tr="tr_{{ $products->id }}" data-toggle="confirmation"
                                                        data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                                                        data-btn-ok-class="btn btn-sm btn-danger"
                                                        data-btn-cancel-label="Cancel"
                                                        data-btn-cancel-icon="fa fa-chevron-circle-left"
                                                        data-btn-cancel-class="btn btn-sm btn-default"
                                                        data-title="Are you sure you want to delete ?" data-placement="left"
                                                        data-singleton="true">
                                                        Delete
                                                    </a>
                                                @endcan




                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

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
@endsection
