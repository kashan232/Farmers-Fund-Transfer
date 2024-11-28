<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('login_assets/images/icons/favicon.ico') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!-- Animations -->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/animate/animate.css') }}">
    <!-- Other Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/vendor/daterangepicker/daterangepicker.css') }}">
    <!-- Utility and Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/css/main.css') }}">
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <!-- Image Section -->
                <div class="login100-more" style="background-image: url('{{ asset('login_assets/images/COVER_BENAZIR.jpg') }}');"></div>

                <!-- Reset Password Form -->
                <form method="POST" action="{{ route('password.store') }}" class="login100-form validate-form">
                    @csrf

                    <!-- Hidden Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Title and Description -->
                    <span class="login100-form-title">
                        <img src="{{ asset('login_assets/images/Sindh_Hari_Card.png') }}" style="width: 100px; padding: 20px 0;"><br>
                        Reset Password
                        <p>This password reset link will expire in <strong class="text-danger">60 minutes</strong></p>
                    </span>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif

                    <!-- Email Input -->
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>

                    <!-- Password Input -->
                    <div class="wrap-input100 validate-input">
                        <input class="input100" id="password" type="password" name="password" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="wrap-input100 validate-input">
                        <input class="input100" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Confirm Password</span>
                    </div>

                    <!-- Submit Button -->
                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Reset Password">
                    </div>

                    <!-- Footer -->
                    <div class="container-login100-form-btn" style="margin-top: 35px; font-size: 11px;">
                        Powered by&nbsp;: <a href="https://xcltechnologies.com/" target="_blank" style="font-size: 11px; font-weight: bold;">&nbsp;XCL Technologies</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('login_assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('login_assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('login_assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('login_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login_assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('login_assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('login_assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('login_assets/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('login_assets/js/main.js') }}"></script>
</body>

</html>
