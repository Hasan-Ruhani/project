<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{url("/")}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Islam Safari</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{url("/")}}" class="nav-item nav-link active">Home</a>
            <a href="{{url("/team")}}" class="nav-item nav-link">Team</a>
            <a href="{{url("/contact")}}" class="nav-item nav-link">Contact</a>

            @if(Cookie::get('token') !== null)
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="{{url("/userLogin")}}" class="dropdown-item">Profile</a>
                    <a href="{{url("/user-logout")}}" class="dropdown-item">Logout</a>
                </div>
            </div>
            @else
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sign In</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="{{url("/userLogin")}}" class="dropdown-item">User Login</a>
                    <a href="testimonial.html" class="dropdown-item">Admin Login</a>
                </div>
            </div>
            @endif

        </div>
        {{-- <a href="{{url("/dashboard")}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Dashboard<i class="fa fa-arrow-right ms-3"></i></a> --}}
    </div>
</nav>
<!-- Navbar End -->