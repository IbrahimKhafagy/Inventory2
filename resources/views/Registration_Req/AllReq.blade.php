@extends('layouts.master')
@section('title')
    Requets

@stop
@section('css')
   <!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Request</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> / All
                    Request</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->

@endsection
@section('content')
    <!-- row -->
    @if (Session::has('Req_delete'))
        <div class="alert alert-success">
            {{ Session::get('Req_delete') }}
        </div>
    @endif



    <!-----------------------------The table of the main page of Requests-------------------------------------------------------------------->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h2>All <font color="#faab0c">Chain Nest </font>Requsts</h2>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>




                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr class="table-success" style="text-align: center">
                                    <th scope="col">id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Company_Address</th>
                                    <th scope="col">Company_Website</th>
                                    <th scope="col">Business_Activity</th>

                                    <th scope="col">Requested_at</th>
                                    <th scope="col">status</th>

                                    <th class="border-bottom-0">Action</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0; ?>
                                @foreach ($Co_Req as $key => $Co_Req)
                                    <?php $i++; ?>

                                    <tr style="text-align: center">

                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $Co_Req->Name }}

                                        </td>
                                        <td>{{ $Co_Req->Position }}

                                        </td>
                                        <td>{{ $Co_Req->Phone }}

                                        </td>
                                        <td>{{ $Co_Req->Email }}

                                        </td>
                                        <td>{{ $Co_Req->Company_Name }}

                                        </td>
                                        <td>{{ $Co_Req->Co_Address }}

                                        </td>
                                        <td>{{ $Co_Req->Co_Website }} </td>



                                        <td>
                                            {{ $Co_Req->Business_Activity }}
                                        </td>
                                        <td>
                                            {{ $Co_Req->created_at }}
                                        </td>
                                        <td> {{ $Co_Req->Status->name }}</td>

                                        <td>
                                            @can('Companiesreq-delete')
                                            <a href="deleteReq/{{ $Co_Req->id }}" class="btn btn-danger">Reject
                                                @endcan

                                                @can('Companiesreq-edit')
                                                <a href="approve/{{ $Co_Req->id }}" class="btn btn-success">Approve
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
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>



@endsection
