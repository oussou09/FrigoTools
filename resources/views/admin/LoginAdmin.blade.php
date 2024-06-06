<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/user/form/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/form/css/style.css') }}">
</head>
<body>

    <div style="display: flex;justify-content: center;" class="title">
        <h2 style="border-bottom: 5px solid black" class="title">Admin Login</h2>
    </div>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div style="display: flex;justify-content: center;" class="signin-content">

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="{{ route('admin.loginAdminRequ') }}" method="POST" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="FullName"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="FullName" id="FullName" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('css/user/form/vendor/jquery/jquery.min.js') }}"></script>
</body>
</html>
