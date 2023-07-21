@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Request</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Registration</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->

@endsection
@section('content')


				<!-- row -->
<div class="container">
				<div class="row">


                    <img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo" >
                    <div class="card" style="width: 70rem;">

                        <div class="card-body">
                          <h5 class="card-title">Registration Request</h5>
                          <h1 class="card-text" style="text-align: center">Welcome to Chain Nest Inventory Managment System</h1>
                                <p style="text-align: center"> Thank you for filling out the registration application, your request will be accepted soon, for Quick response please, click on the Quick button  </p>
                          <a href="#" class="btn btn-primary">Quick</a>
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
