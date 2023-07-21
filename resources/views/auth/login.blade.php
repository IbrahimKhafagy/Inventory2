@extends('layouts.master2')

@section('title')

Login (Chain Nest)
@stop


@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='Home') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Chain<span>Ne</span>st</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>مرحبا بك</h2>
												<h5 class="font-weight-semibold mb-4">  login تسجيل الدخول</h5>
                                                    {{--<h2> <a  href="{{ route('register') }}">Registration firstttt request</a></h2>--}}


                                                {{--   <h4> <a  href="{{ url('/' . ($page = 'register')) }}">Registration  First request</a></h4>--}}



                                                <form method="POST" action="{{ route('login') }}">
                                                 @csrf
													<div class="form-group">
													<label>Email البريد الالكتروني</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                     @error('email')
                                                     <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                     </span>
                                                     @enderror
													</div>

												 <div class="form-group">
											 	 <label>Password كلمة المرور</label>

                                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                  @error('password')
                                                  <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
												  @enderror
                                                  <div class="form-group row">
                                                      <div class="col-md-6 offset-md-4">
                                                           <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <label class="form-check-label" for="remember">
                                                                       {{ __('Remember me') }}
                                                                </label>
                                                           </div>
                                                       </div>
                                                   </div>

												  </div>

                                                    <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __(' Login') }}
                                                    </button>

												</form>
                                                <div class="col-md-6 offset-md-4">
                                                    <br>
                                                <h4> <a  href="{{ url('/' . ($page = 'add-Req')) }}">Registration request</a></h4>
                                                </div>
                                                <hr/>
                                                  <div><h6 style="text-align: center">If you have a problem please, <a  data-effect="effect-scale"
                                                    data-toggle="modal" href="#modaldemo8"> <font color="#faab0c">contact us </font></a></h6></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->

                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/img/media/login2.jpg')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
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
@endsection
@section('js')
@endsection
