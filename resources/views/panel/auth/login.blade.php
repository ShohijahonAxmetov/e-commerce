<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/favicon/favicon.ico" type="image/x-icon"/>

    <!-- Map CSS -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="/assets/css/libs.bundle.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/css/theme.bundle.css" />

    <!-- Title -->
    <title>{{env('APP_NAME')}} | Login</title>
</head>
<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

            <!-- Image -->
            <div class="text-center">
                <img src="/assets/img/illustrations/happiness.svg" alt="..." class="img-fluid">
            </div>

        </div>
        <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                Sign in
            </h1>

            <!-- Subheading -->
{{--            <p class="text-muted text-center mb-5">--}}
{{--                Free access to our dashboard.--}}
{{--            </p>--}}

            <!-- Form -->
            <form action="{{route('auth.login')}}" method="post">
                @csrf
                <!-- Email address -->
                <div class="form-group">

                    <!-- Label -->
                    <label class="form-label">
                        Username
                    </label>

                    <!-- Input -->
                    <input name="username" type="text" class="form-control" placeholder="shohijahonaxmetov">

                    @error('username')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror

                </div>

                <!-- Password -->
                <div class="form-group">
                    <div class="row">
                        <div class="col">

                            <!-- Label -->
                            <label class="form-label">
                                Password
                            </label>

                        </div>
{{--                        <div class="col-auto">--}}

{{--                            <!-- Help text -->--}}
{{--                            <a href="password-reset-cover.html" class="form-text small text-muted">--}}
{{--                                Forgot password?--}}
{{--                            </a>--}}

{{--                        </div>--}}
                    </div> <!-- / .row -->

                    <!-- Input group -->
                    <div class="input-group input-group-merge">

                        <!-- Input -->
                        <input name="password" class="form-control" type="password" placeholder="Enter your password">

                        <!-- Icon -->
                        <span class="input-group-text">
                          <i class="fe fe-eye"></i>
                        </span>

                    </div>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg w-100 btn-primary mb-3">
                    Sign in
                </button>

                <!-- Link -->
{{--                <div class="text-center">--}}
{{--                    <small class="text-muted text-center">--}}
{{--                        Don't have an account yet? <a href="sign-up-illustration.html">Sign up</a>.--}}
{{--                    </small>--}}
{{--                </div>--}}

            </form>

        </div>
    </div> <!-- / .row -->
</div> <!-- / .container -->

<!-- JAVASCRIPT -->
<!-- Map JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

<!-- Vendor JS -->
<script src="/assets/js/vendor.bundle.js"></script>

<!-- Theme JS -->
<script src="/assets/js/theme.bundle.js"></script>

</body>
</html>
