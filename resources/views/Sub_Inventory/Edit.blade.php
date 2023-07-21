@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Inventory</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit
                    Inventory</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Edit the Inventory information
                    </div>
                    <p class="mg-b-20">Please Edit the Required Data which you need to update it</p>
                    <div id="wizard1">
                        <h3>General Information</h3>
                        <form action="updateInv/{{$inv->id}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <section>


                                <div class="control-group form-group">
                                    <label class="form-label"> Inventory Name <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control required" placeholder="Name"
                                        value="{{ $inv->inv_name }}" name="inv_name">
                                </div>

                                <div class="control-group form-group ">
                                    <label class="form-label">Address <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control required" placeholder="Address"
                                        value="{{ $inv->address }}" name="address">
                                </div>

                                <div class="control-group form-group">
                                    <label class="form-label">Manager Name <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control required"
                                        placeholder="Manager Name"value="{{ $inv->manager }}" name="manager">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">Manager Phone <span class="tx-danger">*</span></label>
                                    <input type="number" class="form-control required" placeholder="Manager Phone"
                                        value="{{ $inv->Phone }}" name="Phone">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">Manager Email <span class="tx-danger">*</span></label>
                                    <input type="email" class="form-control required" placeholder="Manager Email"
                                        value="{{ $inv->Email }}" name="Email">
                                </div>

                    </div>
                    <div>
                        {{-- - <a href="updateInv/{{inv->id}}" class="btn btn-success ">Update</a> --}}
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update

                            </button>
                        </div>
                        </section>
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
@endsection
