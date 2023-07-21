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
                <h4 class="content-title mb-0 my-auto">Management</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit
                    SKu</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 col-md-12">

                    <div class="col-lg-12 col-md-12">

                        <div class="modal-body">

                            <form action="skupdate/{{ $sk->id }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row row-sm">
                                    <input type="hidden" value="{{ $sk->id }}" name="id" readonly>

                                    <div class="form-group">
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Product_name</label>
                                        <select name="Product_name" id="Product_name" class="form-control" required>
                                            <option value="" selected disabled> --Select Product_name--
                                            </option>
                                            @foreach ($products as $products)
                                                @if ($products->managesku_id == $sk->id)
                                                    <option value="{{ $products->id }}" selected>
                                                        {{ $products->Product_name }}</option>
                                                @else
                                                    <option value="{{ $products->id }}">{{ $products->Product_name }}{{ $products->Vendor }}
                                                    </option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">SKU</label>
                                        <input type="text" class="form-control" id="SKU" name="SKU"
                                            value="{{ $sk->SKU }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chainnest_Price</label>
                                        <input type="text" class="form-control" id="Chainnest_Price" name="Chainnest_Price"
                                            value="{{ $sk->Chainnest_Price }}">
                                    </div>


                                    <div class="form-group">
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Currancy</label>
                                        <select name="currancy_id" id="currancy_id" class="form-control" required>
                                            <option value="" disabled> --Select Currancy--
                                            </option>
                                            @foreach ($cr as $cr)
                                                @if ($cr->id == $products->currancy_id)
                                                    <option value="{{ $cr->id }}" selected>{{ $cr->name }}</option>

                                                @else
                                                    <option value="{{ $cr->id }}">{{ $cr->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Availability</label>
                                        <input type="text" class="form-control" id="Availablity" name="Availablity"
                                            value="{{ $sk->Availablity }}">
                                    </div>




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
