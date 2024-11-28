<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('')}}/login_assets/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}/login_assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}/login_assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}/login_assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}/login_assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}/login_assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}/login_assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}/login_assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}/login_assets/css/main.css">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-more" style="background-image: url('{{asset('')}}/login_assets/images/COVER_BENAZIR.jpg');">
                </div>
                <form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form">
                    @csrf
                    
                    <span class="login100-form-title">
                        <img src="{{asset('')}}/login_assets/images/Sindh_Hari_Card.png" style="width: 100px;padding: 20px 0;"><br>
                        Forgot Password
                        <p class="mt-4 mb-4">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                        </p>
                    </span>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="email" name="email" :value="old('email')" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <input type="Submit" class="login100-form-btn" value="Resend Password">
                    </div>
                    <div class=" container-login100-form-btn" style="margin-top:35px;font-size: 11px;">
                        Powered by&nbsp;: <a href="https://xcltechnologies.com/" target="_blank" style="font-size: 11px;font-weight:bold;">&nbsp;XCL Technologies</a>
                    </div>

                </form>

            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="{{asset('')}}/login_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('')}}/login_assets/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('')}}/login_assets/vendor/bootstrap/js/popper.js"></script>
    <script src="{{asset('')}}/login_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('')}}/login_assets/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('')}}/login_assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="{{asset('')}}/login_assets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('')}}/login_assets/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('')}}/login_assets/js/main.js"></script>

</body>

</html>