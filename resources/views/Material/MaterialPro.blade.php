Product Details



@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css"
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--Internal  Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Profiles</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Material</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body h-100">
                    <div class="row row-sm ">
                        <div class=" col-xl-5 col-lg-12 col-md-12">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img
                                        src="{{ URL::asset('assets/img/ecommerce/shirt-5.png') }}" alt="image" /></div>
                                <div class="tab-pane" id="pic-2"><img
                                        src="{{ URL::asset('assets/img/ecommerce/shirt-2.png') }}" alt="image" /></div>
                                <div class="tab-pane" id="pic-3"><img
                                        src="{{ URL::asset('assets/img/ecommerce/shirt-3.png') }}" alt="image" /></div>
                                <div class="tab-pane" id="pic-4"><img
                                        src="{{ URL::asset('assets/img/ecommerce/shirt-4.png') }}" alt="image" /></div>
                                <div class="tab-pane" id="pic-5"><img
                                        src="{{ URL::asset('assets/img/ecommerce/shirt-1.png') }}" alt="image" /></div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                            src="{{ URL::asset('assets/img/ecommerce/shirt-5.png') }}"
                                            alt="image" /></a></li>
                                <li><a data-target="#pic-2" data-toggle="tab"><img
                                            src="{{ URL::asset('assets/img/ecommerce/shirt-2.png') }}"
                                            alt="image" /></a></li>
                                <li><a data-target="#pic-3" data-toggle="tab"><img
                                            src="{{ URL::asset('assets/img/ecommerce/shirt-3.png') }}"
                                            alt="image" /></a></li>
                                <li><a data-target="#pic-4" data-toggle="tab"><img
                                            src="{{ URL::asset('assets/img/ecommerce/shirt-4.png') }}"
                                            alt="image" /></a></li>
                                <li><a data-target="#pic-5" data-toggle="tab"><img
                                            src="{{ URL::asset('assets/img/ecommerce/shirt-1.png') }}"
                                            alt="image" /></a></li>
                            </ul>
                        </div>
                        <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                            <h4 class="product-title mb-1"> {{ $mat->material_name }}</h4>
                            <p class="text-muted tx-13 mb-1">info>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>></p>
                            <div class="rating mb-1">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star text-muted"></span>
                                    <span class="fa fa-star text-muted"></span>
                                </div>
                                <span class="review-no">41 reviews</span>
                            </div>
                            <h6 class="price">current price(<font color="#faab0c">Chain nest</font>): <span
                                    class="h3 ml-2">{{ $mat->Chainnest_Price }}</span></h6>
                            <p class="product-description">Description: {{ $mat->Description }} </p>
                            <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87
                                    votes)</strong></p>
                            <div class="sizes d-flex">sizes:
                                <span class="size d-flex" data-toggle="tooltip" title="small"><label
                                        class="rdiobox mb-0"><input checked="" name="rdio" type="radio"> <span
                                            class="font-weight-bold">s</span></label></span>
                                <span class="size d-flex" data-toggle="tooltip" title="medium"><label
                                        class="rdiobox mb-0"><input name="rdio" type="radio">
                                        <span>m</span></label></span>
                                <span class="size d-flex" data-toggle="tooltip" title="large"><label
                                        class="rdiobox mb-0"><input name="rdio" type="radio">
                                        <span>l</span></label></span>
                                <span class="size d-flex" data-toggle="tooltip" title="extra-large"><label
                                        class="rdiobox mb-0"><input name="rdio" type="radio">
                                        <span>xl</span></label></span>
                            </div>
                            <div class="colors d-flex mr-3 mt-2">
                                <span class="mt-2">colors:</span>
                                <div class="row gutters-xs mr-4">
                                    <div class="mr-2">
                                        <label class="colorinput">
                                            <input name="color" type="radio" value="azure" class="colorinput-input"
                                                checked="">
                                            <span class="colorinput-color bg-danger"></span>
                                        </label>
                                    </div>
                                    <div class="mr-2">
                                        <label class="colorinput">
                                            <input name="color" type="radio" value="indigo"
                                                class="colorinput-input">
                                            <span class="colorinput-color bg-secondary"></span>
                                        </label>
                                    </div>
                                    <div class="mr-2">
                                        <label class="colorinput">
                                            <input name="color" type="radio" value="purple"
                                                class="colorinput-input">
                                            <span class="colorinput-color bg-dark"></span>
                                        </label>
                                    </div>
                                    <div class="mr-2">
                                        <label class="colorinput">
                                            <input name="color" type="radio" value="pink"
                                                class="colorinput-input">
                                            <span class="colorinput-color bg-pink"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex  mt-2">
                                <div class="mt-2 product-title">Quantity:</div>
                                <div class="d-flex ml-2">
                                    <ul class=" mb-0 qunatity-list">
                                        <li>
                                            <div class="form-group">
                                                <select name="quantity" id="select-countries17"
                                                    class="form-control nice-select wd-100">
                                                    <option value="1" selected="">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

    <!-- row -->

    <!-- /row -->

    <!-- row -->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Material Profile</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>
                            <tr class="table-success">
                                <th class="border-bottom-0">id</th>
                                <th class="border-bottom-0">material_name</th>
                                <th class="border-bottom-0">Company name</th>
                                <th class="border-bottom-0">Part_No</th>
                                <th class="border-bottom-0"> Vendor</th>

                                <th class="border-bottom-0">Supplier</th>
                                <th class="border-bottom-0">Unit</th>
                                <th class="border-bottom-0">BIN</th>
                                <th class="border-bottom-0">Order_QTY</th>
                                <th class="border-bottom-0">Consumption_Rate</th>
                                <th class="border-bottom-0">per</th>
                                <th class="border-bottom-0">Price</th>
                                <th class="border-bottom-0">type</th>
                                <th class="border-bottom-0">SKU</th>
                                <th class="border-bottom-0">Location</th>
                                <th class="border-bottom-0">Cost</th>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Subcategory</th>
                                <th class="border-bottom-0">Reorder_Date</th>
                                <th class="border-bottom-0">Chainnest_Price</th>
                                <th class="border-bottom-0">attached_id</th>
                                <th class="border-bottom-0">company_name</th>
                                <th class="border-bottom-0">Other_Features</th>
                                <th class="border-bottom-0">Pro_cate_Manager</th>
                                <th class="border-bottom-0">Product_Manager</th>
                                <th class="border-bottom-0">Stock_QTY</th>
                                <th class="border-bottom-0">cost_each</th>
                                <!-- <th class="border-bottom-0">orders_id</th>-->
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Availbilty</th>
                                <th class="border-bottom-0">Action</th>

                            </tr>
                        </thead>
                        <tbody>



                            <tr style="text-align: center">
                                <td> {{ $mat->id }}</td>
                                <td>
                                    <a href="" class="update" data-name="Product_name" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->material_name }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="Co_name" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->Co_name }}</a>
                                </td>


                                <td>
                                    <a href="" class="update" data-name="Part_No" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->Part_No }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="Vendor" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->Vendor }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="Supplier" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->Supplier }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="Unit" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->Unit }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="BIN" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->BIN }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="Order_QTY" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->Order_QTY }}</a>
                                </td>


                                <td>
                                    <a href="" class="update" data-name="Consumption_Rate" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->Consumption_Rate }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="per" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->per }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="per" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->Price }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="name" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->type }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="type" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->SKU }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="Location" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->Location }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="per" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->Cost }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="Category" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->Categ->Category }}</a>
                                </td>


                                <td>
                                    <a href="" class="update" data-name="Subcategory" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->Subcateg->Subcategory }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="per" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->Reorder_Date }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="per" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->Chainnest_Price }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="per" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->attached_id }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="per" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->Company->Company_name }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="per" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->Other_Features }}</a>
                                </td>

                                <td>
                                    <a href="" class="update" data-name="Attached_File" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->Pro_cate_Manager }}</a>
                                </td>

                                <td>
                                    <a href="" class="update" data-name="Price" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->Product_Manager }}</a>
                                </td>

                                <td>
                                    <a href="" class="update" data-name="Reorder_Date" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->Stock_QTY }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="Chainnest_Price" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->cost_each }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="Availbilty" data-type="text"
                                        data-pk="{{ $mat->id }}"
                                        data-title="Enter name">{{ $mat->Description }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="Description" data-type="text"
                                        data-pk="{{ $mat->id }}" data-title="Enter name">{{ $mat->Availbilty }}</a>
                                </td>

                                <td><button type="button" class="btn btn-danger">Delete</button></td>

                            </tr>


                        </tbody>
                    </table>

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
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
    <!-----------------------inline--------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js">
    </script>

    <script type="text/javascript">
        $.fn.editable.defaults.mode = 'inline';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('.update').editable({
            url: "{{ route('material.update') }}",
            type: 'text',
            pk: 1,
            name: 'name',
            title: 'Enter name'
        });
    </script>
@endsection
