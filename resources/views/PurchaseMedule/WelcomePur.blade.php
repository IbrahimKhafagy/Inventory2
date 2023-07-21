@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Purchase</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Welcome</span>
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
                          <h5 class="card-title">Subscribe Request</h5>
                          <h1 class="card-text" style="text-align: center">Welcome to <font color="#faab0c">Chain Nest </font> Purchase of Inventory Management System.</h1>

                          <br>
                          <br>
                          <h6 style="text-align: center">
                            We hope that the inventory system satisfies you, so if you would like
                            to subscribe with us in the Purchase module and would have a good experience, please don't be late and contact us
                          </h6>
                          <div class="col-sm-6 col-md-4 col-xl-3">
                            <a class="btn btn-primary" data-effect="effect-scale"
                                data-toggle="modal" href="#modaldemo8">contact us</a>
                        </div>

                        </div>
                    </div>
                </div>
  <!-------------------------The action of model ajax--------------->

  <div class="modal" id="modaldemo8">


    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Chain Nest Contact</h6><button aria-label="Close" class="Close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>



            <!---The inputs of the form --------------------------------------->


            <div class="modal-body">
                <form action="" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="card-body pt-0">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Sales Manager:</label>

                            <h5>Mohamed Mamdouh</h5>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Email:</label>
                            <h5>mohamed.mamdouh@chainnest.net</h5>
                        </div>

                        <div class="modal-footer">

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
@endsection
