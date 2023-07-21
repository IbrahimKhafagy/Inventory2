{{-- @extends('layouts.master') --}}
@extends('layouts.master2')

@section('title')
    Registration Request

@stop
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Applicant Information</h4>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->

@endsection
@section('content')
    <!-- row -->
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo" >

                <div class="container-sm">
                    <h2 class="content-title mb-0 my-auto">Applicant Information</h2>

                    <br>
                    <div class="main-content-label mg-b-5">
                       <span class="tx-danger">Required</span> Input Validation
                    </div>
                    <div class="modal-body">

                        <div class="card-body pt-0">
                            <form action="{{ route('add.Reqsubmit') }}" method="POST">
                                @csrf
                                <div class="row">


                                    <div class="col-6">
                                        <label for="exampleInputEmail1" class="t">Name <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter your name"
                                            id="Name" name="Name" required="">
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputEmail1" class="t">Position</label>
                                        <input type="text" class="form-control" placeholder="Enter your position"
                                            id="Position" name="Position" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="t">phone <span class="tx-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Enter your phone No."
                                            id="Phone" name="Phone" required="">
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="t">Email <span class="tx-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="Enter your Email"
                                            id="Email" name="Email" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="t">Company Name <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter your Company Name"
                                            id="Company_Name" name="Company_Name" required="">
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="t">Company Address<span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Company address"
                                            id="Co_Address" name="Co_Address">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleFormControlTextarea1" class="t">Company Website</label>
                                        <input type="text" class="form-control" placeholder="Enter Company website"
                                            id="Co_Website" name="Co_Website">
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlTextarea1" class="t">Business Activity</label>
                                        <textarea type="text" class="form-control" placeholder="Enter Business Activity" id="Business Activity"
                                            rows="3" name="Business Activity"></textarea>
                                    </div>
                                </div>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Confirm</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="login">Close</a></button>
                                    <!--<button type="button" class="btn btn-success"><a
                                                href="{{ route('Response') }}">more</a></button>-->

                                </div>



                            </form>
                            @if (Session::has('Reqs_created'))
                                <div class="alert alert-success">
                                    {{ Session::get('Reqs_created') }}
                                </div>
                            @endif
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
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>

@endsection
