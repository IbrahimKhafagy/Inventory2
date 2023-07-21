@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Stores</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Add Stores</span>
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
									Add the stores information
								</div>
								<p class="mg-b-20">Please input the Requried Data</p>
								<div id="wizard1">
									<h3>General Information</h3>
									<section>
										<div class="control-group form-group">
											<label class="form-label"> Store Name <span class="tx-danger">*</span></label>
											<input type="text" class="form-control required" placeholder="Name">
										</div>
										<div class="control-group form-group">
											<label class="form-label">Store Email <span class="tx-danger">*</span></label>
											<input type="email" class="form-control required" placeholder="Email Address">
										</div>
										<div class="control-group form-group">
											<label class="form-label">Store Phone  <span class="tx-danger">*</span></label>
											<input type="number" class="form-control required" placeholder="Number">
										</div>
										<div class="control-group form-group ">
											<label class="form-label">Address <span class="tx-danger">*</span></label>
											<input type="text" class="form-control required" placeholder="Address">
										</div>

                                        <div class="control-group form-group">
											<label class="form-label">Manager Name <span class="tx-danger">*</span></label>
											<input type="text" class="form-control required" placeholder="Manager Name">
										</div>
                                        <div class="control-group form-group mb-0">
											<label class="form-label">Manager Phone <span class="tx-danger">*</span></label>
											<input type="number" class="form-control required" placeholder="Manager Phone">
										</div>
                                        <div class="control-group form-group mb-0">
											<label class="form-label">Manager Email <span class="tx-danger">*</span></label>
											<input type="email" class="form-control required" placeholder="Manager Email">
										</div>
                                        <h3>Secondary Inventory Information</h3>
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Inventory Name <span class="tx-danger">
                                                    *</span></label>
                                            <select name="Scnd_inventory_id" id="Scnd_inventory_id" class="form-control" required>
                                                <option value="" selected disabled> --Select Secondary Inventory --
                                                </option>

                                            </select>
                                        </div>
                                        <div >
                                        <a href="" class="btn btn-success ">Create</a>
                                        </div>
									</section>


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
