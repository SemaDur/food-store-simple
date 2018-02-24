<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Food Order Simple">
    <meta name="author" content="Durakovic Semir">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Food Order</title>
    <!-- favicon -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"  media="all" />


</head>
<body>
    <div class="flex-center position-ref full-height">

        <div class="wrap">

            @include('layouts.header')
        </div>
        <div class="clear"> </div>
        @include('layouts.navbar')



        <div class="clear"> </div>
        <hr>
        <div class="wrap">
            <div class="content">

                @yield('content')


            </div>
            <div class="clear"> </div>
            <hr>
        </div>
        @include('layouts.footer')
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/my-JS.js')}}"></script>
    <script src="{{asset('js/my-AJAX.js')}}"></script>

    <script>
        $('#message').modal('show');
    </script>

</body>

</html>