<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 4 Blog Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('frontend/fontawesome/js/all.min.js') }}"></script>

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('frontend/css/theme-1.css') }}">

</head>

<body>

    @include('includes.header')

    <div class="main-wrapper">
        @yield('content')

        @include('includes.footer')

    </div>
    <!--//main-wrapper-->







    <!-- Javascript -->
    <script src="{{ asset('frontend/plugins/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

</body>

</html>
