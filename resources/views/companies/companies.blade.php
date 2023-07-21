@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-------------------------------edit inline--------------------------------->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">sections</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Companies</span>
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
                        <h4 class="card-title mg-b-0">Companies</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <!----The btn of model of add copmanies with ajax---->
                @can('Companies-create')
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <a class="btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal"
                            href="#modaldemo8"> Add Companies</a>
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

                                    <th class="border-bottom-0">Company_website</th>
                                    <th class="border-bottom-0">Company_Address</th>
                                    <th class="border-bottom-0">Company_Industry</th>
                                    <th class="border-bottom-0">Approver_Name</th>
                                    <th class="border-bottom-0">Approver_date</th>
                                    <th class="border-bottom-0">Company_Logo</th>
                                    <th class="border-bottom-0">Action</th>





                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comp as $comp)
                                    <tr style="text-align: center">
                                        <td><input type="checkbox" name="product" id="product"></td>

                                        <td>{{ $comp->id }}</td>
                                        <td><a href="" class="update_record" data-name="Company_name"
                                            data-type="text" data-pk="{{ $comp->id }}"
                                            data-title="Enter Company_name"> {{ $comp->Company_name }}</a>
                                            </td>
                                        <td><a href="" class="update_record" data-name="Company_code"
                                            data-type="text" data-pk="{{ $comp->id }}"
                                            data-title="Enter Company_code"> {{ $comp->Company_code }}</a></td>
                                        <td><a href="" class="update_record" data-name="Person_Name"
                                            data-type="text" data-pk="{{ $comp->id }}"
                                            data-title="Enter Person_Name"> {{ $comp->Person_Name }}</a></td>
                                        <td><a href="" class="update_record" data-name="Email"
                                            data-type="text" data-pk="{{ $comp->id }}"
                                            data-title="Enter Email"> {{ $comp->Email }}</a></td>
                                        <td><a href="" class="update_record" data-name="Position"
                                            data-type="text" data-pk="{{ $comp->id }}"
                                            data-title="Enter Position"> {{ $comp->Position }}</a></td>
                                        <td><a href="" class="update_record" data-name="Phone"
                                            data-type="text" data-pk="{{ $comp->id }}"
                                            data-title="Enter Phone"> {{ $comp->Phone }}</a></td>
                                        <td>{{ $comp->Comtype->name }}</td>


                                        <td><a href="" class="update_record" data-name="Company_website"
                                            data-type="text" data-pk="{{ $comp->id }}"
                                            data-title="Enter Company_website"> {{ $comp->Company_website }}</a></td>
                                        <td><a href="" class="update_record" data-name="Company_Address"
                                            data-type="text" data-pk="{{ $comp->id }}"
                                            data-title="Enter Company_Address"> {{ $comp->Company_Address }}</a></td>
                                        <td><a href="" class="update_record" data-name="Business_Activity "
                                            data-type="text" data-pk="{{ $comp->id }}"
                                            data-title="Enter Business_Activity "> {{ $comp->Business_Activity }}</a></td>
                                        <td>{{ $comp->Created_by }}</td>
                                        <td>{{ $comp->created_at }}</td>
                                        <td><img src="Company_Logo/{{ $comp->Company_Logo }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>

                                        <td>
                                            <a href="company.show/{{ $comp->id }}" class="btn btn-warning">View
                                                <a href="Company-edit/{{ $comp->id }}" class="btn btn-success">Edit
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

        <div class="modal" id="modaldemo8">


            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add Company</h6><button aria-label="Close" class="Close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('submit.company') }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row row-sm">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company_name <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="Company_name" name="Company_name">
                                 </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company_code</label>
                                    <input type="text" class="form-control" id="Company_code" name="Company_code">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Person_Name <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="Person_Name" name="Person_Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="Email" name="Email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Position</label>
                                    <input type="text" class="form-control" id="Position" name="Position">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control" id="Phone" name="Phone">
                                </div>


                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Company Type <span class="tx-danger">*</span></label>
                                <select name="companytype_id" id="companytype_id" class="form-control" required>
                                    <option value="" selected disabled> -- Select the Company Type Name--</option>
                                    @foreach ($ct as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>


                                <div class="form-group">

                                    <label class="m-2">Company_Logo</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="Company_Logo">

                                   {{-- <label for="exampleInputEmail1">Company_Logo</label>
                                    <input type="file" name="Company_Logo" id="Company_Logo" multiple
                                        class="dropify  @error('files') is-invalid @enderror"
                                        accept=".jpg, .png, image/jpeg, image/png " data-height="70">--}}

                                    @error('files')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company_website</label>
                                    <input type="text" class="form-control" id="Company_website"
                                        name="Company_website">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company_Address  <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="Company_Address"
                                        name="Company_Address">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Business_Activity</label>
                                    <input type="text" class="form-control" id="Business_Activity"
                                        name="Business_Activity">
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Confirm</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><a
                                            href="Customer">Close</a></button>
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
     <!----------------------- edit inline ajax---------------------------------------->



<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>$.fn.poshytip={defaults:null}</script>



<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    $('.update_record').editable({
        url: "{{ route('Comp.updateAjex') }}",
        type: 'text',
        name: 'Company_name',
        pk: 1,
        title: 'Enter Field'
    });
</script>
@endsection
