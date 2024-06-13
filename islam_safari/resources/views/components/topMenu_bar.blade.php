

<!-- Topbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar d-none d-lg-block">
        <div class="topbar-inner">
            <div class="row gx-0">
                <div class="col-lg-7 text-start">
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <span class="fa fa-phone-alt me-2 text-dark"></span>
                        <a href="#" class="text-secondary"><span>+012 345 6789</span></a>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center">
                        <span class="far fa-envelope me-2 text-dark"></span>
                        <a href="#" class="text-secondary"><span>info@example.com</span></a>
                    </div>
                </div>
                
                <div class="col-lg-5 text-end">
                    <div class="h-100 d-inline-flex align-items-center">
                        <span class="text-body">Follow Us:</span>
                        <a class="text-dark px-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="text-dark px-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="text-dark px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="text-dark px-2" href=""><i class="fab fa-instagram"></i></a>

                        @if(Cookie::get('token') !== null)
                            <a class="text-body ps-4" href="{{'/profile'}}"><i class="fa fa-unlock text-dark me-1"></i> Profile</a>
                        @else
                            <a class="text-body ps-4" href="{{'/userLogin'}}"><i class="fa fa-lock text-dark me-1"></i> Signup/login</a>
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @if(Cookie::get('token') !== null)
              <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="{{'/profile'}}">Profile</a></li>
                  <li><a href="{{'/file-show'}}">Dashboard</a></li>
                  <li><a href="{{'/user-logout'}}">Log Out</a></li>
                </ul>
              </li>

              @else
                <a href="{{'/userLogin'}}">Login</a>
              @endif --}}


    <div class="container">
        <nav class="navbar navbar-light navbar-expand-lg py-3">
            <a href="index.html" class="navbar-brand">
                <h1 class="mb-0">Islam<span class="text-primary">Safari</span> </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav ms-lg-auto mx-xl-auto">
                    <a href="{{'/'}}" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="activity.html" class="nav-item nav-link">Activities</a>
                    <a href="event.html" class="nav-item nav-link">Events</a>
                    <a href="sermon.html" class="nav-item nav-link">Sermons</a>
                    <a href="{{'/contact'}}" class="nav-item nav-link">Contact</a>

                    @if(Cookie::get('token') !== null)
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                        <div class="dropdown-menu m-0 rounded-0">
                            <a href="{{'/profile'}}" class="dropdown-item">Profile</a>
                            <a href="{{'/file-show'}}" class="dropdown-item">Dashboard</a>
                            <a href="{{'/user-logout'}}" class="dropdown-item">Logout</a>
                        </div>
                    </div>

                    @else
                        <a href="{{'/userLogin'}}" class="nav-item nav-link">Login</a>
                    @endif

                </div>
                <a href="" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Donate</a>
            </div>
        </nav>
    </div>
</div>
<!-- Topbar End -->