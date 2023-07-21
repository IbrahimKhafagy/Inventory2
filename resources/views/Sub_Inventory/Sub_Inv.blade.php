@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-------------------------------edit inline--------------------------------->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css"
        rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Inventory</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All
                    Sub-Inventories</span>
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
                        <h4 class="card-title mg-b-0">Sub Inventories Table <span class="tx-danger"> except the main</span>
                        </h4>
                        <p>You can select the sub-inventory to do action by clicking on the name of sub inventory.</p>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                <a class="modal-effect btn btn-outline-primary btn-block" href="Add_inv">
                    Create Sub inventory</a>
                </div>
                <!-----------------Table----------------------->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr class="table-success" style="text-align: center">
                                    <th class="border-bottom-0">ID</th>
                                    <th class="border-bottom-0">Inventory name</th>
                                    <th class="border-bottom-0">No.Units</th>
                                    <th class="border-bottom-0">Inventory Address</th>
                                    <th class="border-bottom-0">Company Name</th>
                                    <th class="border-bottom-0">INV_Manager Name</th>
                                    <th class="border-bottom-0">All QTY</th>

                                    <th class="border-bottom-0">Total Price</th>
                                    <!--  <th class="border-bottom-0">Item Code</th>
                        <th class="border-bottom-0">order Date</th>
                        <th class="border-bottom-0">Add by</th>-->
                                    <th class="border-bottom-0">created at</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($inv as $key => $inv)
                                    <?php $i++; ?>
                                    <tr style="text-align: center">

                                        <td>{{ $i }}</td>
                                        <th>

                                          <a class="modal-effect" data-effect="effect-scale" data-toggle="modal"
                                                href="#modaldemo8"> {{ $inv->inv_name }}</a>

                                               {{---- {{ $inv->inv_name }}--}}
                                        </th>
                                        {{-- -{{$inv->pros->Product_name}} --}}
                                        <td> {{ App\Models\products::count() }} products</td>
                                        <td>{{ $inv->address }}</td>
                                        <td>{{ $inv->Compa->Company_name }}</td>
                                        <td> {{ $inv->manager }}</td>
                                        <td>{{ $inv->QTY}}</td>

                                        <td>{{ number_format(App\Models\products::sum('TotalPrice'), 2) }}</td>

                                        <td>{{ $inv->created_at }}</td>
                                        <td>
                                            <a href="invedit/{{ $inv->id }}" class="btn btn-warning ">Edit</a>
                                            <a href="show_inv/{{ $inv->id }}" class="btn btn-success ">View</a>
                                            <a href="inv-Summary/{{ $inv->id }}" class="btn btn-success ">Summary</a>


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
                        <h6 class="modal-title">Choose inventory mode</h6><button aria-label="Close" class="Close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>



                    <!---The inputs of the form --------------------------------------->


                    <div class="modal-body">
                        <form action="" method="" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="card-body pt-0">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">October_INV </label>
                                    <p>Now You are in the October_INV mode</p>
                                    <h6> all action you will do will be reflect in the <span
                                            class="tx-danger">October_Inv</span> only</h6>
                                </div>


                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Confirm</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>




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
            url: "{{ route('Product.updateAjex1') }}",
            type: 'text',
            name: 'Product_name',
            pk: 1,
            title: 'Enter Field'





        });
    </script>
@endsection
