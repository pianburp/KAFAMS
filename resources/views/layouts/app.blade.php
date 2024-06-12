<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
        main{
            flex: 1;
        }
       
        body {
            margin: 0;
            flex: 1;
            padding: 120;}

            #app{
            display: flex;
    min-height: 100vh; /* Make the app container fill the viewport height */
    flex-direction: column;
        }

        .about-section {
            padding-bottom: 0;
            /* Or adjust to your desired value */
        }

        footer {
  position: relative;
  bottom: 0;
  width: 100%; /* Ensures footer spans the full width */
}
        .service-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        nav {
  position: static;
}
main {
   
  py-4; 
}
.navbar {
    background-color: #f8f9fa; 
}


    </style>
</head>

<body id="page-top" class="bg-primary">
    <div id="app">
    
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#welcome">KAFAMS</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
<<<<<<< HEAD
                        @guest
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#home">Home</a>
                        </li>
                        @endguest
=======
>>>>>>> a32908bbc965f7561e832b5dcb64914177506d55
                        @auth
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('home') }}">Home</a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="{{ route('manageResult.index') }}">Results</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="{{ route('manageActivity') }}">Manage Activity</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#contact">Bulletin</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="nav-link btn btn-primary text-white" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Sign Out</a>
                                </form>
                            </li>
                            @endauth
                            @guest
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
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger btn text-green" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger btn text-green" href="{{ route('register') }}">SignUp
                            </a>
                        </li>
<<<<<<< HEAD
                        @endguest
=======
                        @endauth
>>>>>>> a32908bbc965f7561e832b5dcb64914177506d55
                    </ul>
                </div>
            </div>
        </nav>

        <!-- CONTENT -->
        <main class="py-4 mt-5 pt-5">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-black small text-center text-white-50 mt-5">
            <div class="container">
                Copyright &copy; KAFA Management System 2024
            </div>
        </footer>

    </div>
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