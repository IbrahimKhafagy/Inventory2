@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <!--- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->

    <!-------------------------------edit inline--------------------------------->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css"
        rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">inventory</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Product-details</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body h-100">
                    <div class="row row-sm ">
                        <div class=" col-xl-5 col-lg-12 col-md-12">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img
                                        src="{{ URL::asset('assets/img/ecommerce/shirt-5.png') }}" alt="image" /></div>
                                <div class="tab-pane" id="pic-2"><img
                                        src="{{ URL::asset('assets/img/ecommerce/shirt-2.png') }}" alt="image" /></div>
                                <div class="tab-pane" id="pic-3"><img
                                        src="{{ URL::asset('assets/img/ecommerce/shirt-3.png') }}" alt="image" /></div>
                                <div class="tab-pane" id="pic-4"><img
                                        src="{{ URL::asset('assets/img/ecommerce/shirt-4.png') }}" alt="image" /></div>
                                <div class="tab-pane" id="pic-5"><img
                                        src="{{ URL::asset('assets/img/ecommerce/shirt-1.png') }}" alt="image" /></div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                            src="{{ URL::asset('assets/img/ecommerce/shirt-5.png') }}"
                                            alt="image" /></a></li>
                                <li><a data-target="#pic-2" data-toggle="tab"><img
                                            src="{{ URL::asset('assets/img/ecommerce/shirt-2.png') }}"
                                            alt="image" /></a></li>
                                <li><a data-target="#pic-3" data-toggle="tab"><img
                                            src="{{ URL::asset('assets/img/ecommerce/shirt-3.png') }}"
                                            alt="image" /></a></li>
                                <li><a data-target="#pic-4" data-toggle="tab"><img
                                            src="{{ URL::asset('assets/img/ecommerce/shirt-4.png') }}"
                                            alt="image" /></a></li>
                                <li><a data-target="#pic-5" data-toggle="tab"><img
                                            src="{{ URL::asset('assets/img/ecommerce/shirt-1.png') }}"
                                            alt="image" /></a></li>
                            </ul>
                        </div>
                        <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                            <h1 class="product-title mb-1">
                                <font color="#faab0c"> {{ $products->Product_name }}</font> :: {{ $products->Vendor }}
                            </h1>

                            <hr>
                            <h3>current price : {{ number_format($products->Price, 2, '.', ',') }}
                                {{ $products->curr->name }}</h3>
                            <p class="product-description"> </p>

                            <h5>Description: {{ $products->Description }}</h5>
                            <hr>
                            <div>
                                <h5>Other Features : {{ $products->Other_Features }}</h5>

                            </div>


                            <div>
                                <h5>Unit : {{ $products->uni->unit_name }}</h5>

                            </div>

                            <hr>

                            <div>
                                <div>
                                    <h3>Quantity: Quantity: {{ number_format($products->QTY) }}</h3>

                                </div>



                            </div>


                            <h5 lass="price">Total Price : {{ number_format($products->TotalPrice, 2, '.', ',') }}
                                {{ $products->curr->name }}</h5>


                            @can('Notifi-company-contact')
                            <hr>
                            <hr>
                            <h1>Contact Person</h1>
                            <hr>
                                <div>


                                    <div class="form-group">
                                        <h5>Name : {{ $user->name }}</h5>

                                    </div>


                                    <div class="form-group">
                                        <h5> Email : {{ $user->email }}</h5>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5> Phone : {{ $user->Phone }}</h5>

                                </div>
                            @endcan
                            @can('show-companyname')
                                <div class="form-group">
                                    <h5>Company : {{ $user->Compan->Company_name }} </h5>



                                </div>
                                <div class="form-group">
                                    <a href="{{ url('users') }}/{{ $user_id }}" class="btn btn-success"> More </a>
                                    </div>
                            @endcan

                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- /row -->

    <!-- row -->

    <!-- /row -->

    <!-- row -->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Product Profile</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>
                            <tr class="table-success">
                                <th class="border-bottom-0">id</th>
                                <th class="border-bottom-0">Product_name</th>
                                @can('show-companyname')
                                    <th class="border-bottom-0">Company_name</th>
                                @endcan
                                <th class="border-bottom-0">Part_No</th>

                                <th class="border-bottom-0">Supplier</th>


                                <th class="border-bottom-0">Stock_QTY</th>
                                <th class="border-bottom-0">ٌReorder_point</th>
                                <th class="border-bottom-0">Cost</th>

                                <th class="border-bottom-0">Location</th>

                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Subcategory</th>
                                <th class="border-bottom-0">Cataloge</th>



                                <th class="border-bottom-0">Price</th>
                                <th class="border-bottom-0">Currancy</th>

                                <th class="border-bottom-0">Chainnest_Price</th>
                                <th class="border-bottom-0">Product_type</th>


                                <th class="border-bottom-0">Product manager</th>
                                <th class="border-bottom-0">Customers</th>

                                <!--  <th class="border-bottom-0">Other_Features</th>
                                                                        <th class="border-bottom-0">Attached_File</th>
                                                                        <th class="border-bottom-0">Description</th>-->

                                <th class="border-bottom-0">Action</th>



                            </tr>
                        </thead>



                        <tbody>

                            <tr style="text-align: center" id="tr_{{ $products->id }}">
                                <td>{{ $products->id }}</td>
                                <td>
                                    <a href="" class="update_record" data-name="Product_name" data-type="text"
                                        data-pk="{{ $products->id }}"
                                        data-title="Enter name">{{ $products->Product_name }}</a>
                                </td>

                                @can('show-companyname')
                                    <td>{{ $products->Com->Company_name }}</td>
                                @endcan



                                <td>
                                    <a href="" class="update_record" data-name="Part_No" data-type="text"
                                        data-pk="{{ $products->id }}"
                                        data-title="Enter name">{{ $products->Part_No }}</a>
                                </td>

                                <td>
                                    <a href="" class="update_record" data-name="Supplier" data-type="text"
                                        data-pk="{{ $products->id }}"
                                        data-title="Enter name">{{ $products->Supplier }}</a>
                                </td>

                                <td>
                                    <a href="" class="update_record" data-name="QTY" data-type="text"
                                        data-pk="{{ $products->id }}"
                                        data-title="Enter name">{{ number_format($products->QTY) }}</a>
                                </td>

                                <td>
                                    <a href="" class="update_record" data-name="Reorder_QTY" data-type="text"
                                        data-pk="{{ $products->id }}"
                                        data-title="Enter Reorder_QTY">{{ number_format($products->Reorder_QTY) }}</a>
                                </td>

                                <td>
                                    <a href="" class="update_record" data-name="Cost" data-type="text"
                                        data-pk="{{ $products->id }}" data-title="Enter name">{{ $products->Cost }}</a>
                                </td>


                                <td>
                                    <a href="" class="update_record" data-name="Location" data-type="text"
                                        data-pk="{{ $products->id }}"
                                        data-title="Enter name">{{ $products->Location }}</a>
                                </td>



                                <td>{{ $products->Categ->Category }}</td>
                                <td>{{ $products->Subcat->Subcategory }}</td>
                                <td>Cataloge</td>
                                <td>
                                    <a href="" class="update_record" data-name="Price" data-type="text"
                                        data-pk="{{ $products->id }}" data-title="Enter name">{{ $products->Price }}</a>
                                </td>
                                <td>{{ $products->curr->name }}</td>

                                @can('Chainnest_Price')
                                    <td>Chain Nest</td>
                                @endcan
                                <td>{{ $products->type->name }}</td>

                                <td> <a href="" class="update_record" data-name="Product_Manager"
                                        data-type="text" data-pk="{{ $products->id }}"
                                        data-title="Enter Product_Manager">{{ $products->Product_Manager }}</a></td>

                                <td>Customers</td>


                                <td>

                                    @can('product-delete')
                                        <a href="Deleteone" class="btn btn-danger">Delete </a>
                                    @endcan
                                </td>

                            </tr>

                        </tbody>
                    </table>

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
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
    <!-----------------------inline--------------->



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





    <!----------------delete btn ------------------->


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="plugins/Jquery-Table-Check-All/dist/TableCheckAll.js"></script>

    <script type="text/javascript">
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
    </script>
@endsection
