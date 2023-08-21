<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="description"
        content="today we are going to learn How to Create a Responsive Login and Registration Form Template in HTML and CSS" />
    <meta name="keywords"
        content="Animated Login & Registration Form,css form,Form Design,free form design,HTML and CSS,HTML CSS JavaScript,HTML Form,Login Form Design,responsive login form,HTML,CSS,JavaScript,Tailwind,Bootstrap" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/login/style.css') }}" />

    <link rel="stylesheet"
        href="{{ asset('assets/login/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{ asset('assets/login/custom-scripts.js') }}"></script>
</head>

<body>
    <div class="container">
        <input type="checkbox" id="flip" />
        <div class="cover">
            <div class="front">
                <img src="{{ asset('assets/login/images/frontImg.jpg') }}" alt="" />
            </div>
            <div class="back">
                <img class="backImg" src="{{ asset('assets/login/images/backImg.jpg') }}" alt="" />
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" required placeholder="Enter your email" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" required placeholder="Enter your password" />
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Sumbit" />
                            </div>
                            <style>
                                .google-login {
                                    margin-top: 20px;
                                    margin-left: 90px;
                                }

                                .google-btn {
                                    background-color: #fff;
                                    border: 1px solid #ccc;
                                    border-radius: 4px;
                                    padding: 8px 16px;
                                    font-size: 14px;
                                    cursor: pointer;
                                }

                                .google-btn i {
                                    margin-right: 10px;
                                }
                            </style>
                            <div class="google-login">
                                <a href="{{ route('get.Auth.Google') }}" style="text-decoration: #fff;color: black"
                                    class="google-btn">
                                    <i class="fab fa-google"></i> Login with Google
                                </a>
                            </div>
                            <div class="text sign-up-text">Apakah anda belum mempunyai akun? <label
                                    for="flip">Daftar</label>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="signup-form">
                    <div class="title">Signup</div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="name" placeholder="Enter your name" required />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" placeholder="Enter your email" required />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Enter your password" required />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password_confirmation"
                                    placeholder="Enter your confirm password" required />
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Sumbit" />
                            </div>
                            <div class="text sign-up-text">Apakah anda sudah mempunyai akun? <label for="flip">Login
                                    now</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>