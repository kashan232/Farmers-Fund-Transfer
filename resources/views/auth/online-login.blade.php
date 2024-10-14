<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
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
                <form method="POST" action="{{ route('online-login') }}" class="login100-form validate-form" style="position: relative">
                    @csrf
                    <span class="login100-form-title">
                        <img src="{{asset('')}}/login_assets/images/Sindh_Hari_Card.png" style="width: 100px;padding: 20px 0;"><br>
                        Sign In
                        <p>Please enter your Email and Password</p>
                    </span>


                    <div class="wrap-input100 validate-input" >
                        <input class="input100" type="text" name="cnic" id="cnic" :value="old('cnic')" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)">
                        <span class="focus-input100"></span>
                        <span class="label-input100">CNIC</span>
                        @if ($errors->has('cnic'))
                        <div class="text-danger">{{ $errors->first('cnic') }}</div>
                        @endif
                    </div>



                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                        @if ($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>


                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <input type="Submit" class="login100-form-btn" value="Sign in">
                    </div>

                    <div class="mt-2 container-login100-form-btn">
                        Don't have account?&nbsp;<a href="{{route('register')}}">Register</a>
                    </div>

                    <div class=" container-login100-form-btn" style="position: absolute;bottom:5px; left:0">
                        Powered by: XCL Technologies
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



{{--
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
            background: #ddd;
             /* background: #4070f4; */
            background: url('images/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .wrapper {

            background: rgba(255, 255, 255, 0.6);
    backdrop-filter: blur(4.5px);
    -webkit-backdrop-filter: blur(1.px);
    border: none;
    border-radius: 14px;
    box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.05);


            position: relative;
            max-width: 430px;
            width: 100%;
            /* background: #fff; */
            padding: 60px 34px;
            border-radius: 6px;
        }

        .wrapper h2 {
            position: relative;
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }

        .wrapper h2::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 48px;
            border-radius: 12px;
            background: #1d2f17;
        }

        .wrapper form {
            margin-top: 30px;
        }

        .wrapper form .input-box {
            height: 52px;
            margin: 18px 0;
        }

        form .input-box select {
            height: 100%;
            width: 100%;
            outline: none;
            padding: 0 15px;
            font-size: 17px;
            font-weight: 400;
            color: #333;
            border: 1.5px solid #C7BEBE;
            border-bottom-width: 2.5px;
            border-radius: 6px;
            transition: all 0.3s ease;
            background: #fff;
        }

        form .input-box input {
            height: 100%;
            width: 100%;
            outline: none;
            padding: 0 15px;
            font-size: 17px;
            font-weight: 400;
            color: #333;
            border: 1.5px solid #C7BEBE;
            border-bottom-width: 2.5px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .input-box input:focus,
        .input-box input:valid {
            border-color: #1d2f17;
        }

        form .policy {
            display: flex;
            align-items: center;
        }

        form h3 {
            color: #707070;
            font-size: 14px;
            font-weight: 500;
            margin-left: 10px;
        }

        .input-box.button input {
            color: #fff;
            letter-spacing: 1px;
            border: none;
            background: #1d2f17;
            cursor: pointer;
        }

        .input-box.button input:hover {
            background: #1d2f17;
        }

        form .text h3 {
            color: #333;
            width: 100%;
            text-align: center;
        }

        form .text h3 a {
            color: #4070f4;
            text-decoration: none;
        }

        form .text h3 a:hover {
            text-decoration: underline;
        }

        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
    <div class="wrapper">
        <h2>Login</h2>
        @if($errors->has('credentials'))
        {{ $errors->first('credentials') }}
        @endif
        <form method="POST" action="{{ route('online-login') }}">
            @csrf
            <div class="input-box">
                <x-input-label for="cnic"/>
                <x-text-input id="cnic" class="block mt-1 w-full" type="text" name="cnic" :value="old('cnic')" placeholder="41503-1234567-0" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('cnic')" class="mt-2" />
            </div>
            <div class="input-box">
                <x-input-label for="password"/>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="input-box button">
                <input type="Submit" value="Login">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
</body>
</html> --}}
