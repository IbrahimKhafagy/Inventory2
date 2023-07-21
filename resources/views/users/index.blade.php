@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->

    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Managment</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Users
                    index</span>
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
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>




            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <!-------------------SoftDeletes----------------------->
            <div class="mt-2">

                <br>
                <a href="/users">All users</a> | <a href="/users?status=archived">Archived users</a>

                <br><br>
                @if (request()->get('status') == 'archived')
                    {!! Form::open(['method' => 'POST', 'route' => ['restore-all'], 'style' => 'display:inline']) !!}
                    {!! Form::submit('Restore All', ['class' => 'btn btn-primary btn-sm']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
            <!-------End----------->

            <div class="table-responsive">
                <table id="example" class="table key-buttons text-md-nowrap">

                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        @can('show-companyname')
                            <th>Company_name</th>
                        @endcan

                        <th>Status</th>
                        <th>Roles</th>
                        <th>INV-Responsibile</th>
                        <th width="280px">Action</th>
                        <th></th>
                    </tr>
                    @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->Phone }}</td>
                            @can('show-companyname')
                                <td>{{ $user->Compan->Company_name }}</td>
                            @endcan

                            <td>
                                @if ($user->Status == 'Active')
                                    <span class="label text-success d-flex">
                                        <div class="dot-label  bg-success ml-1"> </div>
                                        <span>{{ $user->Status }}</span>



                                    </span>
                                @else
                                    <span class="label text-danger d-flex">
                                        <div class="dot-label bg-danger ml-1"> </div> {{ $user->Status }}
                                    </span>
                                @endif
                            </td>



                            <td>
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>October-inv</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>


                                <!-------------------------------------------------->

                                @if (request()->get('status') == 'archived')
                                    {!! Form::open(['method' => 'POST', 'route' => ['users.restore', $user->id], 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Restore', ['class' => 'btn btn-primary ']) !!}
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger ']) !!}
                                    {!! Form::close() !!}
                                @endif
                            </td>

                            <td>
                                @if (request()->get('status') == 'archived')
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['users.force-delete', $user->id],
                                        'style' => 'display:inline',
                                    ]) !!}
                                    {!! Form::submit('Force Delete', ['class' => 'btn btn-danger ']) !!}
                                    {!! Form::close() !!}
                                @endif
                            </td>
                            <!----------------------------------------->
                        </tr>
                    @endforeach
                </table>

                <!------------------------->








            </div>





        </div>
    </div>

    {!! $data->render() !!}
    </div>
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
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@endsection
