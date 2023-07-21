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
                <h4 class="content-title mb-0 my-auto">Lists</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Suppliers</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">




        <!----The btn of model of add categery with ajax---->
        <div class="col-sm-6 col-md-4 col-xl-3">
            <a class="btn btn-outline-primary btn-block" href="{{ route('add.supp') }}"> Add Suppliers</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table key-buttons text-md-nowrap">
                <thead>
                    <tr class="table-success" style="text-align: center">
                        <td><input type="checkbox" name="product" id="product"></td>

                        <th class="border-bottom-0">id</th>
                        <th class="border-bottom-0">Supplier_Name</th>
                        <th class="border-bottom-0">Supplier_Code</th>
                        <th class="border-bottom-0">Account_Manager</th>
                        <th class="border-bottom-0">companies_id</th>

                        <th class="border-bottom-0"> Contact_Person</th>

                        <th class="border-bottom-0">categories_id</th>
                        <th class="border-bottom-0">subcategories_id</th>
                        <th class="border-bottom-0">finishedpro_id</th>
                        <th class="border-bottom-0">materials_id</th>
                        <th class="border-bottom-0">orders_id</th>
                        <th class="border-bottom-0">suppLocation</th>




                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($supp as $supp)
                        <?php $i++; ?>
                        <tr style="text-align: center">
                            <td><input type="checkbox" name="product" id="product"></td>

                            <td>{{ $supp->id }}</td>
                            <td>{{ $supp->Supplier_Name }}</td>
                            <td>{{ $supp->Supplier_Code }}</td>
                            <td>{{ $supp->Account_Manager }}</td>
                            <td>{{ $supp->companies_id }}</td>
                            <td>{{ $supp->Contact_Person }}</td>
                            <td>{{ $supp->categories_id }}</td>
                            <td>{{ $supp->subcategories_id }}</td>
                            <td>{{ $supp->finishedpro_id }}</td>
                            <td>{{ $supp->materials_id }}</td>
                            <td>{{ $supp->orders_id }}</td>
                            <td>{{ $supp->suppLocation }}</td>

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
