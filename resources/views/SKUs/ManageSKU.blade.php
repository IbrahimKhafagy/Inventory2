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
                <h4 class="content-title mb-0 my-auto">Management</h4>
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
                        <h1 class="card-title mg-b-0">Management Table</h1>
                        <!----The btn of model of add categery with ajax---->

                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <h4>This table to modfiy the SKU value and <font color="#faab0c">Chain Nest </font> price only and see
                        the availablity of the product</h4>

                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#modaldemo8"> Add SKU</a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr class="table-success" style="text-align: center">
                                    <th class="border-bottom-0">id</th>
                                    <th class="border-bottom-0">SKU</th>
                                    <th class="border-bottom-0">ChainNest.price</th>
                                    <th class="border-bottom-0">Currancy</th>
                                    <th class="border-bottom-0">Availablity</th>
                                    <th class="border-bottom-0">Description</th>
                                    <th class="border-bottom-0">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($sk as $key => $sk)
                                    <?php $i++; ?>
                                    <tr style="text-align: center">
                                        <td>{{ $i }}</td>
                                        <td>{{ $sk->SKU }}</td>
                                        <td>{{ $sk->Chainnest_Price }}</td>
                                        <td>{{ $sk->curr->name }}</td>
                                        <td>{{ $sk->Availablity }}</td>
                                        <td>{{ $sk->Description }}</td>

                                        <td><button type="button" class="btn btn-warning">view</button>
                                            <a href="SKUDelete/{{ $sk->id }}" class="btn btn-danger"
                                                data-tr="tr_{{ $sk->id }}" data-toggle="confirmation"
                                                data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                                                data-btn-ok-class="btn btn-sm btn-danger" data-btn-cancel-label="Cancel"
                                                data-btn-cancel-icon="fa fa-chevron-circle-left"
                                                data-btn-cancel-class="btn btn-sm btn-default"
                                                data-title="Are you sure you want to delete ?" data-placement="left"
                                                data-singleton="true">
                                                Delete
                                            </a>
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

        <div class="modal" id="modaldemo8">


            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add SKU</h6><button aria-label="Close" class="Close" data-dismiss="modal"
                            type="button"><span aria-hidden="true">&times;</span></button>
                    </div>



                    <!---The inputs of the form --------------------------------------->


                    <div class="modal-body">
                        <form action="{{ route('ManageSKU.store') }}" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="card-body pt-0">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">SKU</label>
                                    <input type="text" class="form-control" id="SKU" name="SKU">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chainnest_Price</label>
                                    <input type="text" class="form-control" id="Chainnest_Price" name="Chainnest_Price">
                                </div>

                               <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Currancy</label>
                                    <select name="currancy_id" id="currancy_id" class="form-control" required>
                                        <option value="" selected disabled> --Select Currancy--
                                        </option>
                                       {{-- @foreach ($cr as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach--}}``
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="Description" name="Description" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        <h5>Availablity</h5>
                                    </label><br>
                                    <input type="radio" name="Availablity" id="Yes" value="Yes">Yes
                                    <input type="radio" name="Availablity" id="No" value="No">No

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
