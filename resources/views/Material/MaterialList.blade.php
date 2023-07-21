@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">lists</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Materials</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Materials List Table</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
 <!----The btn of model of add categery with ajax---->
 <div class="col-sm-6 col-md-4 col-xl-3">
    <a class="btn btn-outline-primary btn-block" href="{{route('add.material')}}" > Add Material</a>
</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr class="table-success" style="text-align: center">
                                    <td><input type="checkbox" name="material" id="material"></td>
                                    <th class="border-bottom-0">id</th>
                                    <th class="border-bottom-0">material_name</th>
                                    <th class="border-bottom-0">Company_name</th>
                                    <th class="border-bottom-0">Part_No</th>
                                    <th class="border-bottom-0"> Vendor</th>

                                    <th class="border-bottom-0">Supplier</th>
                                    <th class="border-bottom-0">Unit</th>
                                   <!-- <th class="border-bottom-0">BIN</th>
                                    <th class="border-bottom-0">Qty</th>

                                    <th class="border-bottom-0">Reorder_QTY</th>
                                    <th class="border-bottom-0">Consumption_Rate</th>
                                    <th class="border-bottom-0">per</th>
                                    <th class="border-bottom-0">Price</th>
                                    <th class="border-bottom-0">type</th>
                                    <th class="border-bottom-0">SKU</th>-->
                                    <th class="border-bottom-0">Location</th>
                                   <!-- <th class="border-bottom-0">Cost</th>
                                    <th class="border-bottom-0">Category</th>
                                    <th class="border-bottom-0">Subcategory</th>
                                    <th class="border-bottom-0">Reorder_Date</th>
                                    <th class="border-bottom-0">Chainnest_Price</th>-->
                                   <!-- <th class="border-bottom-0">Category</th>

                                    <th class="border-bottom-0">Subcategoy</th>

                                    <th class="border-bottom-0">attached_id</th>
                                    <th class="border-bottom-0">company_name</th>-->
                                    <!--<th class="border-bottom-0">Other_Features</th>
                                    <th class="border-bottom-0">Pro_cate_Manager</th>
                                    <th class="border-bottom-0">Product_Manager</th>
                                    <th class="border-bottom-0">Stock_QTY</th>
                                    <th class="border-bottom-0">cost_each</th>
                                    <th class="border-bottom-0">orders_id</th>
                                    <th class="border-bottom-0">Description</th>
                                    <th class="border-bottom-0">Availbilty</th>-->

                                    <th class="border-bottom-0">Supplier_location</th>
                                    <th class="border-bottom-0">No_of_orders</th>
                                    <th class="border-bottom-0">orders_values</th>
                                    <th class="border-bottom-0">Customer</th>
                                    <th class="border-bottom-0">cust_location</th>





                                    <th class="border-bottom-0">Action</th>


                                </tr>
                            </thead>

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
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
