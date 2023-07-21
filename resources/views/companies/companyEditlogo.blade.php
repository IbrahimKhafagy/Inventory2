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
                <h4 class="content-title mb-0 my-auto">Companies</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Companies Edit</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
@include('flash-message')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Company Detailes with contact person</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <form action="/company-update/{{ $comp->id }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row row-sm">
                                <input type="hidden" value="{{ $comp->id }}" name="id" readonly>



                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company_name</label>
                                    <input type="text" class="form-control" id="Company_name" name="Company_name"
                                        value=" {{ $comp->Company_name }}" readonly>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputEmail1">Person_Name</label>
                                    <input type="text" class="form-control" id="Person_Name" name="Person_Name"
                                        value="{{ $comp->Person_Name }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="Email" name="Email"
                                        value="{{ $comp->Email }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Position</label>
                                    <input type="text" class="form-control" id="Position" name="Position"
                                        value="{{ $comp->Position }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control" id="Phone" name="Phone"
                                        value="{{ $comp->Phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company_Address</label>
                                    <input type="text" class="form-control" id="Company_Address" name="Company_Address"
                                        value="{{ $comp->Company_Address }}">
                                </div>
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Company type</label>
                                    <select name="companytype_id" id="companytype_id" class="form-control" required>
                                        <option value="" selected disabled> --Select Company type--
                                        </option>
                                        @foreach ($ct as $un)
                                            @if ($un->id == $comp->companytype_id)
                                                <option value="{{ $un->id }}" selected>{{ $un->name }}
                                                </option>
                                            @else
                                                <option value="{{ $un->id }}">{{ $un->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Business_Activity</label>
                                    <input type="text" class="form-control" id="Business_Activity"
                                        name="Business_Activity" value="{{ $comp->Business_Activity }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company_Logo</label>
                                    <input type="file" name="Company_Logo" id="Company_Logo" multiple
                                        class="dropify  @error('files') is-invalid @enderror"
                                        accept=".jpg, .png, image/jpeg, image/png " data-height="70">

                                    @error('files')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Update

                                    </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><a
                                            href="{{ route('companies.index') }}">Close
                                    </button>
                                </div>
                            </div>

                        </form>

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
