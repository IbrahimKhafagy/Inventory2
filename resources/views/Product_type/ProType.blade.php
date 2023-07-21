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
                <h4 class="content-title mb-0 my-auto">Sections</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Product Type</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <!--------------------------------------------Product Type Table---------------------------------------------------------->

        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h2 class="card-title mg-b-0">Product Type Table</h2>

                        <!----The btn of model of add categery with ajax---->
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                                data-toggle="modal" href="#modaldemo8"> Add Product Type</a>
                        </div>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>


                <form  method="POST" action="{{url('deletept')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="_method" value="DELETE">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr class="table-success" style="text-align: center">
                                        <th>  <input type="checkbox" name="id[]" ></th>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>Description</th>
                                        <th>deleted status</th>
                                        <th class="border-bottom-0">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 0; ?>

                                    @foreach ($pt as $pt)
                                        <?php $i++; ?>
                                        <tr style="text-align: center">
                                            <td>
                                                <input type="checkbox" name="id[]" value="{{$pt->id}}">
                                            </td>

                                            <td>{{ $i }}</td>
                                            <td> {{ $pt->name }}</td>
                                            <td>{{ $pt->Description }}</td>
                                            <td>{{! empty($pt->deleted_at)?'trashed' : 'published'}}</td>

                                            <td>
                                                <button type="button" class="btn btn-warning">Edit</button>
                                                <a href="deletept/{{ $pt->id }}?delete=true" class="btn btn-danger">Delete</a>

                                                    </td>
                                        </tr>
                                    @endforeach

                                </tbody>


                            </table>

                        </div>
                    </div>
                    <input type="submit" name="fulldelete" value="DeleteMultiple">
                                <input type="submit" name="softdelete" value="SoftDelete">
                </form>

            <hr/>
            <h3>Trashed Data</h3>

            <form  method="POST" action="{{url('deletept')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="DELETE">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr class="table-success" style="text-align: center">
                                    <th>id</th>
                                    <th>name</th>
                                    <th>Description</th>
                                    <th>deleted status</th>
<th></th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 0; ?>

                                @foreach ($trashed as $trash)
                                    <?php $i++; ?>
                                    <tr style="text-align: center">
                                        <td>
                                            <input type="checkbox" name="id[]" value="{{$trash->id}}">

                                        </td>
                                        <td>{{ $i }}</td>
                                        <td> {{ $trash->name }}</td>
                                        <td>{{ $trash->Description }}</td>
                                        <td>{{! empty($pt->deleted_at)?'trashed' : 'published'}}</td>

                                        <td>

                                            <a href="deletept/{{ $trash->id }}" class="btn btn-danger">Delete</a>

                                                </td>
                                    </tr>


                            </tbody>


                        </table>

                    </div>
                </div>
               <!-- <input type="submit" name="restore" value="restore">-->
                 <!-- <input type="submit" name="forcedelete" value="ForceDelete">-->

                <a href="deletept/{{ $trash->id }}?restored=true" name="restored"  value="restored" class="btn btn-primary">restore</a>
                <a href="deletept/{{ $trash->id }}?forceDeleted=true" class="btn btn-warning" name="forceDeleted" value="forceDeleted">ForceDelete</a>
                @endforeach
            </form>




            </div>
        </div>
        <!-------------------------------------------------------End  Table ------------------------------->


        <!-------------------------The action of model ajax--------------->

        <div class="modal" id="modaldemo8">


            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add Prodcut Type</h6><button aria-label="Close" class="Close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>



                    <!---The inputs of the form --------------------------------------->


                    <div class="modal-body">
                        <form action="{{ route('ProType.store') }}" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="card-body pt-0">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">name</label>
                                    <input type="text" class="form-control" id="name" name="name">
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
