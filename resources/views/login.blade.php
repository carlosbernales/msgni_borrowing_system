<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('login_template/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('login_template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login_template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login_template/css/style.css') }}">
    <title>MSGNI</title>
</head>
<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('login_template/images/undraw_remotely_2j6y.svg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In</h3>
                            </div>
                            <form method="POST" action="/account/loginAuth">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input name="email" class="form-control" type="email">
                                    @error('email')
                                    <span class="error-message">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input name="password" class="form-control" type="password">
                                    @error('password')
                                    <span class="error-message">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                                </div>
                                <input type="submit" value="Log In" class="btn btn-block btn-primary">
                                <br>
                                <a href="/register">Register</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('login_template/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('login_template/js/popper.min.js') }}"></script>
    <script src="{{ asset('login_template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login_template/js/main.js') }}"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8a1726e079208d0b","version":"2024.6.1","serverTiming":{},"token":"cd0b4b3a733644fc843ef0b185f98241","b":1}' crossorigin="anonymous"></script>
</body>
</html>
