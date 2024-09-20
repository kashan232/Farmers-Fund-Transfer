<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none !important;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #ddd;
            color: #fff;
            background: url('images/background.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
            /* Ensure the body has relative positioning to contain the ::before element */
            min-height: 100vh;
            /* Ensure body covers full viewport height */
        }

        body::before {
            content: '';
            width: 100%;
            height: 100%;
            background: #000000ad;
            /* Semi-transparent overlay */
            position: fixed;
            /* Fix to viewport */
            top: 0;
            left: 0;
            z-index: -1;
            /* Behind content, but on top of background */
        }

        body>* {
            position: relative;
            /* Ensure content stays above the overlay */
            z-index: 1;
            /* Ensures content is on top of the overlay */
        }


        .login-page-img {
            width: 100px;
            height: 116px;

            margin-bottom: 20px;
        }

        .ftco-section {
            padding: 7em 0;
        }

        .ftco-no-pt {
            padding-top: 0;
        }

        .ftco-no-pb {
            padding-bottom: 0;
        }

        .heading-section {
            /* font-size: 28px; */
            color: #fff;
            font-weight: bold;
        }

        .heading-section.head2 {
            font-size: 47px;
            color: #fff;
            font-weight: bold;
        }

        .img {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .login-wrap {
            position: relative;
            background: #fff;
            border-radius: 10px;
            -webkit-box-shadow: 0px 10px 34px -15px rgba(0, 0, 0, 0.24);
            -moz-box-shadow: 0px 10px 34px -15px rgba(0, 0, 0, 0.24);
            box-shadow: 0px 10px 34px -15px rgba(0, 0, 0, 0.24);
        }

        .login-wrap h3 {
            font-weight: 300;
        }

        .login-wrap .icon {
            width: 80px;
            height: 80px;
            background: #1089ff;
            border-radius: 50%;
            font-size: 30px;
            margin: 0 auto;
            margin-bottom: 10px;
        }

        .login-wrap .icon span {
            color: #fff;
        }

        .form-control {
            height: 52px;
            background: #fff;
            color: #000;
            font-size: 16px;
            border-radius: 5px;
            -webkit-box-shadow: none;
            box-shadow: none;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .form-control:focus,
        .form-control:active {
            outline: none !important;
            -webkit-box-shadow: none;
            box-shadow: none;
            border: 1px solid #1089ff;
        }

        textarea.form-control {
            height: inherit !important;
        }

        .checkbox-wrap {
            display: block;
            position: relative;
            padding-left: 30px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .checkbox-wrap input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "\f0c8";
            font-family: "FontAwesome";
            position: absolute;
            color: rgba(0, 0, 0, 0.1);
            font-size: 20px;
            margin-top: -4px;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }

        @media (prefers-reduced-motion: reduce) {
            .checkmark:after {
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
        }

        /* Show the checkmark when checked */
        .checkbox-wrap input:checked~.checkmark:after {
            display: block;
            content: "\f14a";
            font-family: "FontAwesome";
            color: rgba(0, 0, 0, 0.2);
        }

        /* Style the checkmark/indicator */
        .checkbox-primary {
            color: #1089ff;
        }

        .checkbox-primary input:checked~.checkmark:after {
            color: #1089ff;
        }

        .btn {
            cursor: pointer;
            border-radius: 40px;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            font-size: 15px;
        }

        .btn:hover,
        .btn:active,
        .btn:focus {
            outline: none;
        }

        .btn.btn-primary {
            background: #1089ff !important;
            border: 1px solid #1089ff !important;
            color: #fff !important;
        }

        .btn.btn-success {
            color: #fff;
            background-color: #3f8a5c;
            border-color: #3f8a5c;
        }


        @media (max-width: 820px) and (min-width: 450px) {
            .heading-section.head2 {
                font-size: 47px;
                color: #fff;
                font-weight: bold;
            }

            .media-center {
                text-align: center;
            }

            .login-wrap {
                margin-top: 25px;
            }
        }
    </style>
</head>

<body>


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7 media-center">
                    <div class="mt-2 pt-5">
                        <img src="assets/images/Sindh_Hari_Card_white.png" class="login-page-img">
                        <h1 class="heading-section"><span>Welcome</span> To</h1>
                        <h1 class="heading-section head2">Benazir Hari Card</h1>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <!-- <input type="text" name="email" class="form-control rounded-left" placeholder="Email" required> -->

                                <x-input-label for="email" />
                                <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-group d-flex">
                                <x-input-label for="password" />
                                <x-text-input id="password" class="block mt-1 w-full form-control" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <input type="Submit" class="form-control btn btn-success rounded submit px-3" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>