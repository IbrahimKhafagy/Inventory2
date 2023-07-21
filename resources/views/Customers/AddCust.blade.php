@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">


@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">lists</h4><span class="text mt-1 tx-13 mr-2 mb-0">/
                    Customers</span><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Add</span>
            </div>
        </div>


    </div>


    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <!-- row -->
    <div class="row">


        <div class="col-lg-12 col-md-12">
            <div class="container">






                <div class="modal-body">
                    <form action="{{ route('submit.customer') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row row-sm">


                            <div class="form-group">
                                <label for="exampleInputEmail1">Cust_Name</label>
                                <input type="text" class="form-control" id="Cust_Name" name="Cust_Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cust_Code</label>
                                <input type="text" class="form-control" id="Cust_Code" name="Cust_Code">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Account_Manager</label>
                                <input type="text" class="form-control" id="Account_Manager" name="Account_Manager">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">companies_id</label>
                                <input type="text" class="form-control" id="companies_id" name="companies_id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact_Person</label>
                                <input type="text" class="form-control" id="Contact_Person" name="Contact_Person">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">finishedpro_id</label>
                                <input type="text" class="form-control" id="finishedpro_id" name="finishedpro_id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">materials_id</label>
                                <input type="text" class="form-control" id="materials_id" name="materials_id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Location</label>
                                <input type="text" class="form-control" id="Location" name="Location">
                            </div>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Confirm</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="Customer">Close</a></button>
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
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>



    <!----------------------------------------------Call Subcategory from Category--------------------------------------------------------------------->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript">
        $("document").ready(function() {
            $('select[name="Category"]').on('change', function() {
                var catId = $(this).val();
                if (catId) {
                    $.ajax({
                        url: '/subcatories/' + catId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="Subcategory"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="Subcategory"]').append(
                                    '<option value=" ' + key + '">' + value +
                                    '</option>');
                            })
                        }

                    })
                } else {
                    $('select[name="Subcategory"]').empty();
                }
            });


        });
    </script>



@endsection
