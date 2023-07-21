@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Stores</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Stores</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
<!--div-->
<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Bordered Table</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            <p class="tx-12 tx-gray-500 mb-2">Example of Valex Bordered Table.. <a href="">Learn more</a></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table key-buttons text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">ID</th>
                            <th class="border-bottom-0">Inventory_name</th>
                            <th class="border-bottom-0">Product</th>
                            <th class="border-bottom-0">Vendor</th>
                            <th class="border-bottom-0">Store Address</th>
                            <th class="border-bottom-0">Company Name</th>
                            <th class="border-bottom-0">Deliverd QTY</th>
                            <th class="border-bottom-0">Item Price</th>
                            <th class="border-bottom-0">Total Price</th>
                            <th class="border-bottom-0">Item Code</th>
                            <th class="border-bottom-0">order Date</th>
                            <th class="border-bottom-0">Add by</th>
                            <th class="border-bottom-0">created at</th>
                            <th class="border-bottom-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>id</td>
                            <td>name</td>
                            <td>Tablet</td>
                            <td> Samsung</td>
                            <td>Egypt</td>
                            <td>Teqneia</td>
                            <td>2500</td>
                            <td>$320,800</td>
                            <td>$68952,256</td>
                            <td>p564545448</td>
                            <td>2011/04/25</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>view,Edit</td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/div-->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
