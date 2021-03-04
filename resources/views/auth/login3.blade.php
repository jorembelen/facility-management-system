
<!DOCTYPE html>
<html lang="en">

<head>

	  <!-- CSRF Token -->
	  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>

	<link rel="canonical" href="pages-blank.html" />
	<link rel="shortcut icon" href="img/favicon.ico">
    <link href="/assets/css/light.css" rel="stylesheet">
    <link href="/assets/css/prevent.css" rel="stylesheet">

</script></head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="main d-flex justify-content-center w-100">
		<main class="content d-flex p-0">
			<div class="container d-flex flex-column">
				<div class="row h-100">
					<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
						<div class="d-table-cell align-middle">

							<div class="text-center mt-4">
								<h1 class="h2">Welcome to SADARA Alwaha Housing Maintenance System</h1>
								
							</div>

							<div class="card">
								<div class="card-body">
									<div class="m-sm-4">
										<div class="text-center">
											<img src="{{ asset('assets/img/sadara.png') }}" alt="Chris Wood" class="img-fluids" width="200" height="80" />
										</div><br>
                                        <p class="lead text-center">
                                            Sign in to your account to continue
                                        </p>
                                        <form class="text-left" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                            @csrf
											<div class="form-group">
												<label>Email</label>
												<input class="form-control form-control-lg" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" />
												@if ($errors->has('email'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
											</div>
											<div class="form-group">
												<label>Password</label>
												<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
												{{-- <small>
            <a href="pages-reset-password.html">Forgot password?</a>
						</small> --}}       @if ($errors->has('password'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('password') }}</strong>
													</span>
												@endif
											</div>
											<div>
												<div class="custom-control custom-checkbox align-items-center">
													<input type="checkbox" class="custom-control-input" value="remember-me" name="remember-me" checked>
													<label class="custom-control-label text-small">Remember me next time</label>
												</div>
											</div>
											<div class="text-center mt-3">
												<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
												<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
											</div>
										</form>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

   <script src="/assets/js/app.js"></script>

</body>

</html>