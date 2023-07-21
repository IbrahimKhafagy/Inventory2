@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Sections</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Subcategory
                    Edit</span>
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
                <h2>Edit Subcategory</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('Subcategories.index') }}"> Back</a>
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


    {!! Form::model($sub, ['method' => 'POST', 'route' => ['update.sub', $sub->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subcategry Name:</strong>
                {!! Form::text('Subcategory', null, ['placeholder' => 'Subcategory', 'class' => 'form-control'])!!}
                <strong>Description:</strong>
                {!! Form::text('Description', null, ['placeholder' => 'Description', 'class' => 'form-control'])!!}



            </div>
        </div>
        <div class="form-group">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Category</label>
            <select name="categories_id" id="categories_id" class="form-control"
                required>
                <option value="" selected disabled> --Select Category--
                </option>
                @foreach ($cat as $cat)
                    @if ($cat->id == $sub->categories_id)
                    <option value="{{ $cat->id }}" selected>{{ $cat->Category }}</option>

                @else
                <option value="{{ $cat->id }}">{{ $cat->Category }}</option>
                @endif
                @endforeach
            </select>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection
