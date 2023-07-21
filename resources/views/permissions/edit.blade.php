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
							<h4 class="content-title mb-0 my-auto">Permissions</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ edit</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">

                    <div class="py-12 w-full">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                                <div class="flex p-2">
                                    <a href="{{ route('permissions.index') }}"
                                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Permission Index</a>
                                </div>
                                <div class="flex flex-col p-2 bg-slate-100">
                                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                                        <form method="POST" action="{{ route('permissions.update', $permission) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="sm:col-span-6">
                                                <label for="name" class="block text-sm font-medium text-gray-700"> Permission name
                                                </label>
                                                <div class="mt-1">
                                                    <input type="text" id="name" name="name"
                                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                        value="{{ $permission->name }}" />
                                                </div>
                                                @error('name')
                                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="sm:col-span-6 pt-5">
                                                <button type="submit"
                                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="mt-6 p-2 bg-slate-100">
                                    <h2 class="text-2xl font-semibold">Roles</h2>
                                    <div class="flex space-x-2 mt-4 p-2">
                                        @if ($permission->roles)
                                            @foreach ($permission->roles as $permission_role)
                                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                                                    action="{{ route('permissions.roles.remove', [$permission->id, $permission_role->id]) }}"
                                                    onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">{{ $permission_role->name }}</button>
                                                </form>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="max-w-xl mt-6">
                                        <form method="POST" action="{{ route('permissions.roles', $permission->id) }}">
                                            @csrf
                                            <div class="sm:col-span-6">
                                                <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                                                <select id="role" name="role" autocomplete="role-name"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('role')
                                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="sm:col-span-6 pt-5">
                                        <button type="submit"
                                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
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
