@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Help</h4>
						</div>
					</div>

				</div>

				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">


                    <div class="row row-sm">
                        <div class="col-md">
                            <div class="card bg-gray-200 bd-0">
                                <div class="card-body">
                                    <h2 class="card-title tx-dark ">change your Password</h2>
                                    <h6 class="card-subtitle mg-b-15"></h6>
                                    <p class="card-text">To edit your profile and change your info <br>
                                        <br>
                                        please, Got to the management from the side menu</p><br>
                                       <h6>management -> Edit user</h6>

                                    <a class="card-link" href="{{ url('/' . ($page = 'users.edit1'))}}">Edit user</a>
                                </div>
                            </div>
                        </div>
                    -->
                        <div class="col-md mg-md-t-0">
                            <div class="card bg-gray ">
                                <div class="card-body">
                                    <h5 class="card-title tx-dark ">First step</h5>
                                    <p class="card-subtitle mg-b-15 tx-dark-15">Create your Categories</p>
                                    <p class="card-text">To publish/display your products in the system you must first do some steps <br> first create your categories & subcategory</p>
                                    <h6>components -> Sections -> Categories </h6>
                                    <a class="card-link " href="{{ url('/' . ($page = 'Categories')) }}">Category</a>
                                </div>
                            </div>
                        </div>
                    -->
                        <div class="col-md mg-md-t-0">
                            <div class="card bg-gray ">
                                <div class="card-body">
                                    <h5 class="card-title tx-dark ">Second step</h5>
                                    <p class="card-subtitle mg-b-15 tx-dark-15">Create your Subcategories</p>
                                    <p class="card-text">To publish/display your products in the system you must first do some steps <br> first create your categories & subcategory</p>
                                    <h6>components -> Sections -> Subcategories </h6>
                                    <a class="card-link " href="{{ url('/' . ($page = 'Subcategories')) }}">Subcategory</a>
                                </div>
                            </div>
                        </div>


                        <div class="col-md mg-md-t-0">
                            <div class="card bg-gray ">
                                <div class="card-body">
                                    <h5 class="card-title tx-dark ">Third step</h5>
                                    <p class="card-subtitle mg-b-15 tx-dark-15">Create your products</p>
                                    <p class="card-text">After creating your categories & subcategory now you can publish your products in the system</p>
                                    <h6>inventory -> Create Products -> add products </h6> OR <h6> side menu-> add products</h6>
                                    <a class="card-link " href="{{ url('/' . ($page = 'add-product')) }}">Add products</a>
                                </div>
                            </div>
                        </div>

                        </div>

                    </div>
                    <div class="col-md mg-md-t-0">
                        <div class="card bg-gray ">
                            <div class="card-body">
                                <h1  style="text-align: center">Help</h1>
                                <p class="card-subtitle mg-b-15 tx-dark-15" style="text-align: center">For more help or Questions</p>
                                <p class="card-text" style="text-align: center">Please,contact  <font color="#faab0c">Chain Nest</font></p>

                                <h6 style="text-align: center"> <a  data-effect="effect-scale"
                                    data-toggle="modal" href="#modaldemo8"> <font color="#faab0c">contact us </font></a></h6>
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
