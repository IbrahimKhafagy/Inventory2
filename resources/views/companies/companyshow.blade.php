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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css"
        rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Companies</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Companies show</span>
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
                        <h4 class="card-title mg-b-0">Company Detailes with contact person</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>

                                <tr class="table-success" style="text-align: center">


                                    <th class="border-bottom-0">id</th>

                                    <th class="border-bottom-0">Company_name</th>
                                    <th class="border-bottom-0">Person_Name</th>
                                    <th class="border-bottom-0">Email</th>
                                    <th class="border-bottom-0">Position</th>
                                    <th class="border-bottom-0">Phone</th>
                                    <th class="border-bottom-0">Company_Industry</th>





                                </tr>
                            </thead>
                            <tbody>



                                <tr style="text-align: center">


                                    <td>{{ $comp->id }}</td>
                                    <td><a href="" class="update_record" data-name="Company_name" data-type="text"
                                            data-pk="{{ $comp->id }}" data-title="Enter Company_name">
                                            {{ $comp->Company_name }}</a>
                                    </td>

                                    <td><a href="" class="update_record" data-name="Person_Name" data-type="text"
                                            data-pk="{{ $comp->id }}" data-title="Enter Person_Name">
                                            {{ $comp->Person_Name }}</a></td>
                                    <td><a href="" class="update_record" data-name="Email" data-type="text"
                                            data-pk="{{ $comp->id }}" data-title="Enter Email">
                                            {{ $comp->Email }}</a></td>
                                    <td><a href="" class="update_record" data-name="Position" data-type="text"
                                            data-pk="{{ $comp->id }}" data-title="Enter Position">
                                            {{ $comp->Position }}</a></td>
                                    <td><a href="" class="update_record" data-name="Phone" data-type="text"
                                            data-pk="{{ $comp->id }}" data-title="Enter Phone">
                                            {{ $comp->Phone }}</a></td>
                                    <td><a href="" class="update_record" data-name="Business_Activity "
                                            data-type="text" data-pk="{{ $comp->id }}"
                                            data-title="Enter Business_Activity "> {{ $comp->Business_Activity }}</a></td>



                                </tr>

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
    <!----------------------- edit inline ajax---------------------------------------->



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
            url: "{{ route('Comp.updateAjex') }}",
            type: 'text',
            name: 'Company_name',
            pk: 1,
            title: 'Enter Field'
        });
    </script>
@endsection
