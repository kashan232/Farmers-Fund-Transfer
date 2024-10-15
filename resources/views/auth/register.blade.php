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
                <form method="POST" action="{{ route('register') }}" class="login100-form validate-form" style="position: relative">
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

                    <div class="wrap-input100 validate-input" >
                        <input class="input100" type="text" name="number" id="number" :value="old('number')" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Number</span>
                        @if ($errors->has('number'))
                        <div class="text-danger">{{ $errors->first('number') }}</div>
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

                    <div class="wrap-input100 validate-input" data-validate="Confirm Password is required">
                        <input class="input100" type="password" name="password_confirmation" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Confirm Password</span>
                        @if ($errors->has('password_confirmation'))
                        <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>



                    <div class="container-login100-form-btn">
                        <input type="Submit" class="login100-form-btn" value="Sign Up">
                    </div>

                    <div class="mt-2 container-login100-form-btn">
                        Already have Account?&nbsp;<a href="{{route('login')}}">Login</a>
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
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration Form in HTML CSS</title>
    <!---Custom CSS File--->
    <style>
        /* Import Google font - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #1d2f17;
        }

        .container {
            position: relative;
            max-width: 500px;
            width: 100%;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .container header {
            font-size: 1.3rem;
            color: #333;
            font-weight: 500;
            text-align: center;
        }

        .container .form {
            margin-top: 30px;
        }

        .form .input-box {
            width: 100%;
            margin-top: 20px;
        }

        .input-box label {
            color: #333;
        }

        .form :where(.input-box input, .select-box) {
            position: relative;
            height: 50px;
            width: 100%;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 3px;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 0 15px;
        }

        .input-box input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .form .column {
            display: flex;
            column-gap: 15px;
        }

        .form .gender-box {
            margin-top: 20px;
        }

        .gender-box h3 {
            color: #333;
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .form :where(.gender-option, .gender) {
            display: flex;
            align-items: center;
            column-gap: 50px;
            flex-wrap: wrap;
        }

        .form .gender {
            column-gap: 5px;
        }

        .gender input {
            accent-color: #1d2f17;
        }

        .form :where(.gender input, .gender label) {
            cursor: pointer;
        }

        .gender label {
            color: #707070;
        }

        .address :where(input, .select-box) {
            margin-top: 15px;
        }

        .select-box select {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            color: #707070;
            font-size: 1rem;
        }

        .form button {
            height: 55px;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #1d2f17;
        }

        .form button:hover {
            background: rgb(88, 56, 250);
        }

        /*Responsive*/
        @media screen and (max-width: 500px) {
            .form .column {
                flex-wrap: wrap;
            }

            .form :where(.gender-option, .gender) {
                row-gap: 15px;
            }
        }
        .text-danger{
            color:red;
        }
    </style>
</head>

<body>
    <section class="container">
        <header>Registration Form</header>
        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            <div class="input-box">
                <x-input-label for="name" :value="__('CNIC')" />
                <x-text-input id="CNIC" class="block mt-1 w-full" type="text" name="cnic" :value="old('CNIC')" required autofocus autocomplete="CNIC" placeholder="41503-1234567-0" required />
                @error('cnic')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="input-box">
                <label>Mobile Number</label>
                <x-text-input id="Number" class="block mt-1 w-full" type="text" name="number" :value="old('Number')" required autofocus autocomplete="Number" placeholder="Enter Your Mobile Number" required />
                @error('number')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="input-box">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Enter Your Password" />
                @error('password')
                   <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="input-box">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confirm Password" />
                @error('password.confirmed')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit">Submit</button>
        </form>
    </section>
</body>

</html> --}}
