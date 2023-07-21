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
                <h4 class="content-title mb-0 my-auto">Contacts</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Add new
                    Contact</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <!-----------------------------------The check box about contact type----------------------------------------------------->

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="form-validation.html" data-parsley-validate="">
                        <p class="mg-b-10">Please, choose the contact type from the following <span
                                class="tx-danger">*</span></p>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                contact_type
                            </label>

                            <br>

                            <input type="radio" name="contact_type" id="Supplier" value="Supplier"> Supplier
                            <br>
                            <input type="radio" name="contact_type" id="Buyer" value="Buyer"> Buyer
                            <br>
                            <input type="radio" name="contact_type" id="Outsource" value="Outsource"> Outsource
                            <br>
                            <input type="radio" name="contact_type" id="Others" value="Others"> Others
                            <br>


                        </div>


                    </form>
                </div>
            </div>
        </div>







        <!---------------------------------------End of check box----------------------------------------------------------->
        <!---------------------------------------input to create new----------------------------------------------------------->

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('submit.contact') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <h1 style="text-align: center">
                            <font color="#faab0c">
                                <p id="typefont"></p>
                            </font>
                        </h1>




                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <label class="form-label">Name: </label>
                                    <input class="form-control" name="Person_Name" placeholder="Enter Person_Name"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Position: </label>
                                    <input class="form-control" name="Position" placeholder="Enter Position" type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Company Name: </label>
                                    <input class="form-control" name="Company_Name" placeholder="Enter Company_Name"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Phone </label>
                                    <input class="form-control" name="Phone" placeholder="Enter lastname" type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Email: </label>
                                    <input class="form-control" name="Email" placeholder="Enter Email" type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Address:</label>
                                    <input class="form-control" name="Address" placeholder="Enter Address" required=""
                                        type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">product: </label>
                                    <input class="form-control" name="product" placeholder="Enter product"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Product Type: </label>
                                    <input class="form-control" name="product_type" placeholder="Enter product_type"
                                        type="text">
                                </div>
                            </div>
                            <input name="contact_type" id="contect_type" type="hidden">
                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10"
                                    type="submit">Create</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!------------------------End of create------------------------------------------->
    <!----------------------------The table of contacts------------------------------------------------------>

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Contact Table</h4>



                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!-- All the contact Type Code -->

                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="ContactList" class="btn btn-warning">All Contacts</a>
                        <a href="{{ route('Supplier.Show') }}" class="btn btn-outline-primary">Suppliers</a>
                        <a href="{{ route('Buyer.Show') }}" class="btn btn-outline-primary">Buyers</a>
                        <a href="{{ route('Outsource.Show') }}" class="btn btn-outline-primary">Outsource</a>
                        <a href="{{ route('Other.Show') }}" class="btn btn-outline-primary">Others</a>
                    </div>

                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>
                            <tr class="table-success" style="text-align: center">
                            <tr class="table-success" style="text-align: center">
                                <th scope="col"><input type="checkbox" id="master"></th>
                                <th class="border-bottom-0">ID</th>
                                <th class="border-bottom-0">Contact Type</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Company Name</th>
                                <th class="border-bottom-0">Position</th>
                                <th class="border-bottom-0">Phone</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0"> Address</th>
                                <th class="border-bottom-0">Product</th>
                                <th class="border-bottom-0">Product Type</th>
                                <th class="border-bottom-0">Action</th>

                            </tr>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>

                            @foreach ($cl as $c)
                                <?php $i++; ?>
                                <tr style="text-align: center">
                                    <td><input type="checkbox" class="sub_chk" data-id=""></td>

                                    <th>{{ $i }}</th>

                                    <td>{{ $c->contact_type }}</td>
                                    <td>{{ $c->Person_Name }}</td>
                                    <td>{{ $c->Company_Name }}</td>
                                    <td>{{ $c->Position }}</td>
                                    <td>{{ $c->Phone }}</td>
                                    <td>{{ $c->Email }}</td>
                                    <td>{{ $c->Address }}</td>
                                    <td>{{ $c->product }}</td>
                                    <td>{{ $c->product_type }}</td>
                                    <td>


                                        @can('contactlist-delete')
                                            <a class="btn btn-danger" href="deletecontact/{{ $c->id }}">Delete</a>
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









    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>

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


    <!---------------------------------- Script contact two forms----->

    <script>
        $("input:radio[name=contact_type]").change(function() {
            $("#typefont").text(this.value);
            document.getElementById("contect_type").value = this.value;

            // var catId = $(this).val();
        });
    </script>
@endsection
