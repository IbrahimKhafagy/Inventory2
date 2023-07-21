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

 <!------------------------------delete with sweet alart--------------------------------->




@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Sections</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Subcategories</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

@if (Session::has('Sub_delete'))
        <div class="alert alert-success">
            {{ Session::get('delete.sub') }}
        </div>
    @endif
    <!-- row -->
    <div class="row">


        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h2 class="card-title mg-b-0">Subcategroies Table</h2>


                        <!----The btn of model of add categery with ajax---->
                        @can('Subcategories-create')
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                                data-toggle="modal" href="#modaldemo8"> Add Subcategory</a>
                        </div>
                        @endcan
                        <!---------------------------------------- End btn (add)------------->

                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr class="table-success" style="text-align: center">
                                    <th>id</th>
                                    <th>Subcategory</th>
                                    <th>categories_id</th>
                                    <th>Description</th>

                                   <!-- <th>Create_at</th>
                                    <th>Created_by</th>-->


                                    <th class="border-bottom-0">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>

                                @foreach ($sub as $sub)
                                    <?php $i++; ?>
                                    <tr style="text-align: center">
                                        <td>{{ $i}}</td>
                                        <td> <a href="" class="update_record" data-name="Subcategory"
                                            data-type="text" data-pk="{{ $sub->id }}"
                                            data-title="Enter Subcategory">{{ $sub->Subcategory }}</a></td>

                                        <td>{{ $sub->Categ->Category }}</td>

                                        <td><a href="" class="update_record" data-name="Description"
                                            data-type="text" data-pk="{{ $sub->id }}"
                                            data-title="Enter Subcategory">{{ $sub->Description }}</a></td>
                                       {{-- <td>{{ $sub->create_at }}</td>
                                        <td>{{ $sub->Created_by }}</td>--}}
                                        <td>
                                           {{-- @can('Subcategories-edit')
                                            <a href="Subedit/{{ $sub->id }}" class="btn btn-warning">Edit
                                                @endcan--}}
                                                {{--- <form method="POST" action="{{ route('delete.sub', $sub->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>--}}
                                               {{--@can('Subcategories-delete')--}}
                                            <a href="deletesub/{{ $sub->id }}" class="btn btn-danger">Delete
                                                 {{--@endcan--}}

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
                        <h6 class="modal-title">Add Subcategories</h6><button aria-label="Close" class="Close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <!---The inputs of the form --------------------------------------->


                    <div class="modal-body">
                        <form action="{{ route('Subcategories.store') }}" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="card-body pt-0">

                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Category <span class="tx-danger"> *</span></label>
                        <select name="categories_id" id="categories_id" class="form-control" required>
                            <option value="" selected disabled> -- Select the Category Name--</option>
                            @foreach ($cat as $cat)
                                <option value="{{ $cat->id}}">{{ $cat->Category }}</option>
                            @endforeach
                        </select>
                        <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subcategory <span class="tx-danger"> *</span></label>
                                    <input type="text" class="form-control" id="Subcategory" name="Subcategory">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="Description" name="Description" rows="3"></textarea>
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

    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
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
        url: "{{ route('Sub.updateAjex') }}",
        type: 'text',
        name: 'Subcategory',
        pk: 1,
        title: 'Enter Field'
    });
</script>


<!--------------------------------------sweet alart in delete----------------->


<script type="text/javascript">

     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>

@endsection
