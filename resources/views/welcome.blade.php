<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="KAFA Management System">
    <meta name="author" content="KAFA Development Team">

    <title>Welcome to KAFA Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/grayscale.min.css') }}" rel="stylesheet">
    
    <!-- Custom CSS for image sizing -->
    <style>
        .service-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
    </style>
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">KAFA Management</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                    </li>
                    <!-- Conditional Rendering for Login Button -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-white" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-white" 
                               href="{{ route(auth()->user()->isAdmin() ? 'admin.dashboard' : 'home') }}">
                               Dashboard
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead" id="home">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">KAFA Management System</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">Efficient Management of KAFA Programs and Activities</h2>
                <a href="#about" class="btn btn-primary js-scroll-trigger">Learn More</a>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section class="about-section text-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">About KAFA Management System</h2>
                    <p class="text-white-50">The KAFA Management System (MKMS) is a comprehensive solution designed to streamline the management of KAFA registration, activities, bulletins, results, and yearly timetables. Our system ensures efficient operations and provides users with easy access to all essential services.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="projects-section bg-light" id="services">
        <div class="container">

            <!-- Service Row 1 -->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7 p-3">
                    <img class="img-fluid mb-3 mb-lg-0 service-image" src="{{ asset('img/student-registration.png') }}" alt="Student Registration">
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Student Registration</h4>
                        <p class="text-black-50 mb-0">Manage student registrations efficiently with our user-friendly interface. Administrators can easily handle new registrations, updates, and profile management.</p>
                    </div>
                </div>
            </div>

            <!-- Service Row 2 -->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7 order-lg-2 p-3">
                    <img class="img-fluid mb-3 mb-lg-0 service-image" src="{{ asset('img/events_payment.jpg') }}" alt="KAFA Activities">
                </div>
                <div class="col-xl-4 col-lg-5 order-lg-1">
                    <div class="featured-text text-center text-lg-right">
                        <h4>KAFA Activities</h4>
                        <p class="text-black-50 mb-0">Organize and manage various KAFA activities such as courses and events. Track participation and handle payments seamlessly.</p>
                    </div>
                </div>
            </div>

            <!-- Service Row 3 -->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7 p-3">
                    <img class="img-fluid mb-3 mb-lg-0 service-image" src="{{ asset('img/bulletin.jpeg') }}" alt="Bulletin Management">
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Bulletin Management</h4>
                        <p class="text-black-50 mb-0">Keep the KAFA community informed with our efficient bulletin management system. Create, update, and distribute bulletins with ease.</p>
                    </div>
                </div>
            </div>

            <!-- Service Row 4 -->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7 order-lg-2 p-3">
                    <img class="img-fluid mb-3 mb-lg-0 service-image" src="{{ asset('img/results.jpg') }}" alt="Student Results">
                </div>
                <div class="col-xl-4 col-lg-5 order-lg-1">
                    <div class="featured-text text-center text-lg-right">
                        <h4>Student Results</h4>
                        <p class="text-black-50 mb-0">Centralize student performance data and results. Administrators can manage and publish results, and students can view their academic progress.</p>
                    </div>
                </div>
            </div>

            <!-- Service Row 5 -->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7 p-3">
                    <img class="img-fluid mb-3 mb-lg-0 service-image" src="{{ asset('img/timetable.jpg') }}" alt="Yearly Timetable">
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Yearly Timetable</h4>
                        <p class="text-black-50 mb-0">Create and manage yearly timetables for all KAFA activities. Allocate resources, assign instructors, and optimize schedules for efficient organization.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">UMPSA, Pekan, Pahang, 26600</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">
                                <a href="mailto:el.harshfit@gmail.com">el.harshfit@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">+60183840085</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a href="https://twitter.com/" class="mx-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/" class="mx-2">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://telegram.org/" class="mx-2">
                    <i class="fab fa-telegram-plane"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
        <div class="container">
            Copyright &copy; KAFA Management System 2024
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/welcometobelarus.min.js') }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
</body>

</html>
