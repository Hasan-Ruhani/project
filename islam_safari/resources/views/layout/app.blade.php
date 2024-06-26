<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>THEMosque - Mosque Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <link href=
        "https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
                  rel="stylesheet">
                  

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="assets/css/style.css" rel="stylesheet">

        {{-- backend script --}}
        <script src="{{asset('assets/js2/jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('assets/js2/axios.min.js')}}"></script>

        <link href="{{asset('assets/css2/jquery.dataTables.min.css')}}" rel="stylesheet" />
    

        {{-- <link href="{{asset('assets/css2/bootstrap.css')}}" rel="stylesheet" /> --}}
        <link href="{{asset('assets/css2/animate.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css2/fontawesome.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css2/style.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css2/toastify.min.css')}}" rel="stylesheet" />
    
        <script src="{{asset('assets/js2/jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('assets/js2/jquery.dataTables.min.js')}}"></script>
    
        <script src="{{asset('assets/js2/toastify-js.js')}}"></script>
        <script src="{{asset('assets/js2/config.js')}}"></script>
    
        {{-- <script defer src="//cdn.tailwindcss.com?plugins=forms"></script> --}}
        
        <script src="{{asset('assets/js2/axios.min.js')}}"></script>

    </head>

    <body>




  <div>
    @yield('content')
  </div>

        
   <!-- JavaScript Libraries -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="{{asset('assets/lib/wow/wow.min.js')}}"></script>
   <script src="{{asset('assets/lib/easing/easing.min.js')}}"></script>
   <script src="{{asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
   <script src="{{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>

   <!-- Template Javascript -->
   <script src="{{asset('assets/js/main.js')}}"></script>

   {{-- backedn script --}}
   <script src="{{asset('assets/js2/bootstrap.bundle.js')}}"></script>
</body>

</html>