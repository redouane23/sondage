<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sondage') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!--font awesome-->
    <link rel="stylesheet" href="{{ asset('dist/css/font-awesome5.11.2.min.css') }}">

    <!--bootstrap-->
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">

    <!--vendor css-->
    <link rel="stylesheet" href="{{ asset('dist/css/vendor.min.css') }}">

    <!--main styles -->
    <link rel="stylesheet" href="{{ asset('dist/css/main.min.css') }}">
</head>
<body>

<section id="banner">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand text-primary" href="{{ route('home') }}">Sond<span
                    class="text-primary font-weight-bold">age</span></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars" style="color:#5bc0de; font-size:28px;"></i>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary mr-0 mr-md-2 mb-2 mb-md-0 mt-2 mt-md-0">S'identifier</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">S'inscrire</a>
                        @endif
                    @else
                        <a href="{{ route('dashboard.welcome') }}"
                           class="btn btn-primary mr-0 mr-md-2 mb-2 mb-md-0 mt-2 mt-md-0">{{ Auth::user()->name }}</a>
                        <a href="{{ route('logout') }}" class="btn btn-outline-primary" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Déconnexion</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>

                    @endguest

                </ul>

            </div>

        </div>
    </nav><!--end of nav-->
</section><!-- end of banner section -->

@yield('content')

<footer id="footer" class="py-3 bg-primary text-center text-white">

    <p class="text-capitalize mb-0">&copy; tous droits réservés pour Sondage 2020</p>

    <div class="social_icons">

        <a href="" class="text-white mr-2"><i class="fab fa-facebook"></i></a>
        <a href="" class="text-white mr-2"><i class="fab fa-youtube mr-2"></i></a>
        <a href="" class="text-white mr-2"><i class="fab fa-twitter mr-2"></i></a>

    </div>

</footer><!--end of footer-->

<!--jquery-->
<script src="{{ asset('dist/js/jquery-3.4.0.min.js') }}"></script>


<!--bootstrap-->
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/js/popper.min.js') }}"></script>

<!--vendor js-->
<script src="{{ asset('dist/js/vendor.min.js') }}"></script>

<!--main scripts-->
<script src="{{ asset('dist/js/main.min.js') }}"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>


<!--owl slides scripts-->
<script>
    $(document).ready(function () {
        $("#slide .slides").owlCarousel({
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            loop: true,
            nav: false,
            items: 1,
            dots: false,
            margin: 20,
            //autoWidth:true,
            //autoHeight:true,
        });

    });
</script>

@yield('script')

{{--custom js--}}
<script src="{{ asset('dist/js/custom/updated.js') }}"></script>


</body>
</html>
