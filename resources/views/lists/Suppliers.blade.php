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
                    Suppliers</span>
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
                        <h4 class="card-title mg-b-0">Companies Type :Suppliers</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <!----The btn of model of add copmanies with ajax---->
                @can('Companies-create')
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <a class="btn btn-outline-primary btn-block" href="companies"> Add Companies</a>
                    </div>
                @endcan


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr class="table-success" style="text-align: center">
                                    <td><input type="checkbox" name="product" id="product"></td>

                                    <th class="border-bottom-0">id</th>

                                    <th class="border-bottom-0">Company_name</th>
                                    <th class="border-bottom-0">Company_code</th>
                                    <th class="border-bottom-0">Person_Name</th>
                                    <th class="border-bottom-0">Email</th>
                                    <th class="border-bottom-0">Position</th>
                                    <th class="border-bottom-0">Phone</th>
                                    <th class="border-bottom-0">Company_type</th>
                                    <th class="border-bottom-0">Company_Logo</th>
                                    <th class="border-bottom-0">Company_website</th>
                                    <th class="border-bottom-0">Company_Address</th>
                                    <th class="border-bottom-0">Company_Industry</th>
                                    <th class="border-bottom-0">Approver_Name</th>
                                    <th class="border-bottom-0">Approver_date</th>
                                    <th class="border-bottom-0">Action</th>





                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comp as $comp)
                                    <tr style="text-align: center">
                                        <td><input type="checkbox" name="product" id="product"></td>

                                        <td>{{ $comp->id }}</td>
                                        <td>{{ $comp->Company_name }} </td>
                                        <td>{{ $comp->Company_code }}</td>
                                        <td>{{ $comp->Person_Name }}</td>
                                        <td>{{ $comp->Email }}</td>
                                        <td>{{ $comp->Position }}</td>
                                        <td>{{ $comp->Phone }}</td>
                                        <td>{{ $comp->Comtype->name }}</td>
                                        <td><img src="Company_Logo/{{ $comp->Company_Logo }}" class="img-responsive"
                                            style="max-height:100px; max-width:100px" alt="" srcset=""></td>
                                        <td>{{ $comp->Company_website }}</td>
                                        <td>{{ $comp->Company_Address }}</td>
                                        <td>{{ $comp->Business_Activity }}</td>
                                        <td>{{ $comp->Created_by }}</td>
                                        <td>{{ $comp->created_at }}</td>
                                        <td>
                                            @Can('Companies-delete')
                                                <a href="DeleteCompany/{{ $comp->id }}" class="btn btn-danger">Delete
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


        <!-------------------------The action of model ajax--------------->


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
