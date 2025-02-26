<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ asset('dist/img/favicon.png') }}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
        <!-- FontAwesome CSS -->
        <link rel="stylesheet" href="{{ asset('dist/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/uf-style.css') }}">
        <title>Login</title>
    </head>
    <body>
        <div class="uf-form-signin">
            <div class="text-center">
                <a href="https://uifresh.net/"><img src="{{ asset('dist/img/logo-fb.png') }}" alt="" width="100" height="100"></a>
            <h1 class="text-white h3">Account Login</h1>
            </div>
            <form class="mt-5">
                <div class="input-group uf-input-group input-group-lg mb-3">
                    <span class="input-group-text fa fa-user"></span>
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="input-group uf-input-group input-group-lg mb-3">
                    <span class="input-group-text fa fa-lock"></span>
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="d-flex mb-3 justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input uf-form-check-input" id="exampleCheck1">
                        <label class="form-check-label text-white" for="exampleCheck1">Remember Me</label>
                    </div>
                </div>
                <div class="d-grid mb-4">
                    <button type="submit" class="btn uf-btn-primary btn-lg">Login</button>
                </div>
                <div class="mt-4 text-center">
                    <span class="text-white">Don't have an account?</span>
                    <a href="{{ asset('register.html') }}">Sign Up</a>
                </div>
            </form>
        </div>

        <!-- JavaScript -->

        <!-- Separate Popper and Bootstrap JS -->
        <script src="{{ asset('dist/js/popper.min.js') }}"></script>
        <script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>