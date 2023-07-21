@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Managment</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Users
                    Edit </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {!! Form::text('Phone', null, ['placeholder' => 'Phone', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
            </div>
        </div>
        @can('show-companyname')
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name:</strong>
                    <select name="companies_id" id="companies_id" class="form-control" required>
                        <option value="" selected disabled> --Select Company name--
                        </option>
                        @foreach ($comp as $pp)
                            <option value="{{ $pp->id }}">{{ $pp->Company_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endcan

        <!----------------------------------------------------------------------------->
        <div class="row row-sm mg-b-20">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">
                    <strong>Status </strong>
                    <select name="Status" id="select-beast" class="form-control  nice-select  custom-select">
                        <option value="{{ $user->Status }}">{{ $user->Status }}</option>
                        <option value="Active">Active</option>
                        <option value="Not Active"> Not Active</option>
                    </select>
                </div>


            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
            </div>
        </div>



        <div class="d-flex my-xl-auto right-content">

            <div class="mb-3 mb-xl-0">
                <strong>INV-Responsibile:</strong>
                <p>please select the inventory that user responsibile for</p>
                <div class="btn-group dropdown">

                    <br>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <select name="currancy_id" id="currancy_id" class="form-control input-lg dynamic"
                        data-dependent="state">
                        <option value="">Select Inventory/Sub Inv.</option>
                    </div>
                    </select>
                </div>
            </div>
        </div>


    </div>


        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="form-group">
                <strong>Role:</strong>
            </label>

            <br>
            {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
            <input type="radio" name="roles[]" id="SystemAdmin" value="SystemAdmin"> SystemAdmin
            <input type="radio" name="roles[]" id="adminchain" value="adminchain">adminchain
            <input type="radio" name="roles[]" id="admincompany" value="admincompany"> admincompany
            <input type="radio" name="roles[]" id="user" value="user"> user

        </div> --}}



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>


    {!! Form::close() !!}



    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
