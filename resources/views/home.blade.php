@extends('layouts.app')
@section('content')

<header class="masthead" id="home">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
            <h1 class="mx-auto my-0 text-uppercase">KAFA Management System</h1>
            <h2 class="text-white-50 mx-auto mt-2 mb-5">Efficient Management of KAFA Programs and Activities</h2>
            <a href="#about" class="btn btn-primary js-scroll-trigger">Learn More</a>
        </div>
    </div>
</header>

<!-- CONTENT -->
 <br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('js/welcometobelarus.min.js') }}"></script>
<script src="{{ asset('js/map.js') }}"></script>
<section id="contact" class="contact-section bg-black">
    <div class="container">
        Copyright &copy; KAFA Management System 2024
    </div>
</section>
@endsection