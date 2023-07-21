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
                <h4 class="content-title mb-0 my-auto">Contacts</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Contacts
                    list</span>
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
                        <h4 class="card-title mg-b-0">All Contact List</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>



                        <!-- All the contact Type Code -->
                        @can('contactlist-create')
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-warning"><a href="AddnewContact">Add New Contact</a></button>


                        </div>
                        @endcan
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <a href="ContactList" class="btn btn-warning">All Contacts</a>
                             <!-- Fillter the contact Type Code -->
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a href="{{route('Supplier.Show')}}" class="btn btn-outline-primary">Suppliers</a>
                                <a href="{{route('Buyer.Show')}}" class="btn btn-outline-primary">Buyers</a>
                                <a href="{{route('Outsource.Show')}}" class="btn btn-outline-primary">Outsource</a>
                                <a href="{{route('Other.Show')}}"  class="btn btn-outline-primary">Others</a>



                            </div>


                            <thead>
                                <tr class="table-success" style="text-align: center">
                                    <th scope="col"><input type="checkbox" id="master"></th>
                                    <th class="border-bottom-0">ID</th>
                                    <th class="border-bottom-0">Contact Type</th>

                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Company Name</th>

                                    <th class="border-bottom-0">Position</th>
                                    <th class="border-bottom-0">Phone</th>
                                    <th class="border-bottom-0">Email</th>
                                    <th class="border-bottom-0"> Address</th>

                                    <th class="border-bottom-0">Product</th>
                                    <th class="border-bottom-0">Product Type</th>
                                    <th class="border-bottom-0">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                  <?php $i = 0; ?>
                                @foreach ($cl as $cl )

                                <?php $i++; ?>
                                <tr style="text-align: center">
                                    <td><input type="checkbox" class="sub_chk" data-id=""></td>
                                    <th>{{$i}}</th>

                                    <td>{{$cl->contact_type}}</td>
                                    <td>{{$cl->Person_Name}}</td>
                                    <td>{{$cl->Company_Name}}</td>
                                    <td>{{$cl->Position}}</td>
                                    <td>{{$cl->Phone}}</td>
                                    <td>{{$cl->Email}}</td>
                                    <td>{{$cl->Address}}</td>
                                    <td>{{$cl->product}}</td>
                                    <td>{{$cl->product_type}}</td>
                                    <td>


                                        @can('contactlist-delete')
                                        <a class="btn btn-danger"  href="deletecontact/{{$cl->id}}">Delete</a>
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
@endsection
