
@extends('layouts.master')


@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--------------------------------- multipule upload images----------------------->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-------------------------------edit inline--------------------------------->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css"
        rel="stylesheet" />

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
                <h4 class="content-title mb-0 my-auto">Inventory</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   all Sub-Inventories</span>
<span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Sub-inventory View</span>

            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('flash-message')

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
        @if (Session::has('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif




        <!------------------------------------------------------------------------------------------------------>
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <img src="Company_Logo/{{ Auth::user(0)->Compan->Company_Logo }}" class="sign-favicon ht-40"
                        alt="logo">

                    <div class="d-flex justify-content-between">

                        <h2>Welcome to <font color="#faab0c"> {{ Auth::user(0)->Compan->Company_name }} </font>Inventory
                            System(Sub)</h2>
                        @can('product-create')
                            <!----The btn of model of add categery with ajax---->
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <a class="modal-effect btn btn-outline-primary btn-block" href="{{ route('add.product') }}">
                                    Create Product</a>
                                    <a class="modal-effect btn btn-outline-primary btn-block" href="Add_inv">
                                        Create Sub inventory</a>
                            </div>
                        @endcan
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="inventory" class="btn btn-primary active">All </a>
                        <button type="button" class="btn btn-outline-primary"><a
                                href="{{ route('filter.Materials') }}">Purchase Items</a></button>
                        <button type="button" class="btn btn-outline-primary"><a
                                href="{{ route('filter.products') }}">Selling Items</a></button>

                    </div>
                    @can('product-delete')
                        <button class="btn btn-danger delete_all" data-url="{{ url('inventoryDeleteAll') }}">Delete All
                            Selected</button>
                    @endcan
                    {{-- -<div class="mt-2">


                        <br>
                        <a href="/inventory">All Products</a> | <a href="/inventory?status=archived">Archived products</a>

                        <br><br>
                        @if (request()->get('status') == 'archived')
                            {!! Form::open(['method' => 'POST', 'route' => ['inventory.allres'], 'style' => 'display:inline']) !!}
                            {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>- --}}

                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr class="table-success" style="text-align: center">
                                    <th scope="col"><input type="checkbox" id="master"></th>
                                    <th class="border-bottom-0">id</th>
                                    <th class="border-bottom-0">product</th>
                                    <th class="border-bottom-0">sub-inventory</th>
                                    @can('show-companyname')
                                        <th class="border-bottom-0">Company_name</th>
                                    @endcan
                                    <th class="border-bottom-0">Part_No</th>
                                    <th class="border-bottom-0">Vendor</th>
                                    <th class="border-bottom-0">Supplier</th>
                                    <th class="border-bottom-0">Unit</th>

                                    <th class="border-bottom-0">BIN</th>



                                    <th class="border-bottom-0">Stock_QTY</th>
                                    <th class="border-bottom-0">Reorder_Point</th>
                                    <th class="border-bottom-0">Consumption_Rate</th>

                                    @can('price')
                                        <th class="border-bottom-0">Price</th>
                                    @endcan

                                    <th class="border-bottom-0">type</th>

                                    <th class="border-bottom-0">Location</th>

                                    <th class="border-bottom-0">Category</th>
                                    <th class="border-bottom-0">Subcategory</th>
                                    <th class="border-bottom-0">Barcode</th>
                                    <th class="border-bottom-0">Cover</th>
                                    <th class="border-bottom-0">Reorder_Date</th>
                                    <th class="border-bottom-0">Expected_Delivery_Date</th>
                                    @can('Chainnest_Price')
                                        <th class="border-bottom-0">Chainnest_Price</th>
                                    @endcan
                                    <th class="border-bottom-0">Availbility</th>
                                    @can('Ask-Notification')
                                        <th class="border-bottom-0">Ask</th>
                                    @endcan
                                    <th class="border-bottom-0">input Date</th>
                                    <th class="border-bottom-0">By</th>
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
                                            <a href="" class="update_record" data-name="Product_name"
                                                data-type="text" data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Product_name }}</a>
                                        </td>
                                        <td>
                                            <a href="" class="update_record" data-name="inv_name"
                                                data-type="text" data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->inven->inv_name }}</a>
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
                                            <a href="" class="update_record" data-name="Part_No" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Part_No }}</a>
                                        </td>


                                        <td>
                                            <a href="" class="update_record" data-name="Vendor" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Vendor }}</a>
                                        </td>


                                        <td>
                                            <a href="" class="update_record" data-name="Supplier"
                                                data-type="text" data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Supplier }}</a>
                                        </td>
                                        <td>
                                            {{ $products->uni->unit_name }}
                                        </td>
                                        {{-- <td></td> --}}

                                        <td>
                                            <a href="" class="update_record" data-name="BIN" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->BIN }} </a>
                                        </td>


                                        <td>
                                            <a href="" class="update_record" data-name="QTY" data-type="text"
                                                data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ number_format($products->QTY) }}</a>
                                        </td>
                                        <td>
                                            <a href="" class="update_record" data-name="Reorder_QTY"
                                                data-type="text" data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Reorder_QTY }}</a>
                                        </td>

                                        <td>
                                            <a href="" class="update_record" data-name="Consumption_Rate"
                                                data-type="text" data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Consumption_Rate }}</a>
                                            {{ $products->per }}
                                        </td>


                                        @can('price')
                                            <td>
                                                <a href="" class="update_record" data-name="Price" data-type="text "
                                                    data-pk="{{ $products->id }}"
                                                    data-title="Enter name">{{ number_format ($products->Price, 2, '.', ',') }}
                                                </a>{{ $products->curr->name }}
                                            </td>
                                        @endcan
                                        <!------------------------------------------------------------->




                                        <td>{{ $products->Type->name }}</td>

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
                                            <a href="" class="update_record" data-name="Location"
                                                data-type="text" data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Location }}</a>
                                        </td>



                                        <td>{{ $products->Categ->Category }}</td>
                                        <td>{{ $products->Subcat->Subcategory }}</td>
                                        <td>{!! DNS1D::getBarcodeHTML("$products->product_code", 'PHARMA') !!}
                                             P - {{ $products->product_code }}
                                            {{---href="prnpriview/{{ $products->id }}"----}}
                                            <p><a href="{{ route('prnpriviewfsec', ['id' => $products->id]) }}" class="btn btn-success">Print</a></p>
                                            </td>

                                            <!---
               {!! DNS2D::getBarcodeHTML('4445645656', 'QRCODE') !!}
               {!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA') !!}
               {!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA2T') !!}
               {!! DNS1D::getBarcodeHTML('4445645656', 'CODABAR') !!}
               {!! DNS1D::getBarcodeHTML('4445645656', 'KIX') !!}
               {!! DNS1D::getBarcodeHTML('4445645656', 'RMS4CC') !!}
               {!! DNS1D::getBarcodeHTML('4445645656', 'UPCA') !!}--->





                                        <td><img src="cover/{{ $products->cover }}" class="img-responsive"
                                                style="max-height:100px; max-width:100px" alt="" srcset="">
                                        </td>


                                        <td>
                                            <a href="" class="update_record" data-name="Reorder_Date"
                                                data-type="text" data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Reorder_Date }}</a>
                                        </td>
                                        <td>
                                            <a href="" class="Expected_Date" data-name="Expected_Date"
                                                data-type="text" data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Expected_Date }}</a>
                                        </td>

                                        @can('Chainnest_Price')
                                            <td><a href="" class="update_record" data-name="Chain_Price"
                                                    data-type="text" data-pk="{{ $products->id }}"
                                                    data-title="Enter Chain_Price">{{ $products->Chain_Price }}</td>
                                        @endcan
                                        <td>
                                            <a href="" class="update_record" data-name="Availbility"
                                                data-type="text" data-pk="{{ $products->id }}"
                                                data-title="Enter name">{{ $products->Availbility }}</a>
                                        </td>
                                        @can('Ask-Notification')
                                            <td>
                                                @if ($products->productype_id == 1)
                                                    <a href="send-notification/{{ $products->id }}"
                                                        class="btn btn-secondary">

                                                        Ask For Selling </a>
                                                @else
                                                    <a href="send-notification/{{ $products->id }}"
                                                        class="btn btn-secondary">

                                                        Ask For Quotation </a>
                                                @endif



                                            </td>
                                        @endcan

                                        <td>{{ $products->created_at }}</td>
                                        <td>{{ $products->Created_by }}</td>


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
                                                    data-btn-ok-class="btn btn-sm btn-danger" data-btn-cancel-label="Cancel"
                                                    data-btn-cancel-icon="fa fa-chevron-circle-left"
                                                    data-btn-cancel-class="btn btn-sm btn-default"
                                                    data-title="Are you sure you want to delete ?" data-placement="left"
                                                    data-singleton="true">
                                                    Delete
                                                </a>
                                            @endcan
                                        </td>



                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
        {{-- -
        @if (Session::has('notification'))
        <div class="alert alert-success">
            {{ Session::get('Request has been sent') }}
        </div>
    @endif --}}









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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
@endsection

