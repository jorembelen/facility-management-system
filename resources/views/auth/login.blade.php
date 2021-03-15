
<!DOCTYPE html>
<html lang="en">

<head>
   
	  <!-- CSRF Token -->
	  <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>SADARA||FMS</title>
	
	<link rel="shortcut icon" href="img/favicon.ico">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="/assets/login/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/login/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/assets/login/css/form-2.css" rel="stylesheet" type="text/css" />
    <link href="/assets/login/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="/assets/login/css/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="/assets/login/css/switches.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="form">
    @include('sweetalert::alert')

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <div class="text-center">
                            <img src="{{ asset('assets/img/sadara.png') }}" width="200" height="80">
                        </div><br>
                        <p class="">Log in to your account to continue.</p>
                        
                        <form class="text-left" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" id="login">
                        @csrf
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">USERNAME</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="login" type="text" class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" placeholder="e.g john.doe" required autofocus>
                                   @if ($errors->has('username') || $errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <!-- <a href="#" class="forgot-pass-link"></a> -->
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Log In</button>
                                    </div>
                                </div>

                               

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/assets/login/js/jquery-3.1.1.min.js"></script>
    <script src="/assets/login/bootstrap/js/popper.min.js"></script>
    <script src="/assets/login/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="/assets/login/js/form-2.js"></script>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}"></script>

          <!-- Laravel Javascript Validation -->
          <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
          {!! JsValidator::formRequest('App\Http\Requests\LoginRequest', '#login'); !!}

</body>

</html>