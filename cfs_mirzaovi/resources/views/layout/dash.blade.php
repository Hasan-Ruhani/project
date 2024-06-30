<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Islam Safari</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    

    <link href="{{asset('https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css2/jquery.dataTables.min.css')}}" rel="stylesheet" />
    

    <link href="{{asset('assets/css2/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css2/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css2/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css2/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css2/toastify.min.css')}}" rel="stylesheet" />

    <script src="{{asset('assets/js2/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/js2/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('assets/js2/toastify-js.js')}}"></script>
    <script src="{{asset('assets/js2/config.js')}}"></script>

    <script src="{{asset('assets/js2/axios.min.js')}}"></script>



</head>

<body>


    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>



    <div>
        @yield('content')
    </div>

    <script src="{{asset('assets/js2/bootstrap.bundle.js')}}"></script>

</body>
</html>