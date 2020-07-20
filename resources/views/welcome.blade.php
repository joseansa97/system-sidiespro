<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('dist/js/bootstrap.min.css') }}" >
        
        <!-- Optional JavaScript -->
        <script src="{{ asset('dist/js/jquery-3.5.1.slim.min.js') }}" ></script>
        <script src="{{ asset('dist/js/bootstrap.min.js') }}" ></script>

    </head>
    
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <div class="image">
                            <a href="#" class="brand-link">
                                <img src="{{asset('dist/img/logotectlaxiaco.png')}}" alt="Logo" width="40px" height="40px" class="brand-image img-circle elevation-4"
                        style="opacity: .8">
                            </a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Instituto Tecnológico de Tlaxiaco</a>
                    </li>
                </ul>
            </div>
            <div class="mx-auto order-0">
                <a class="navbar-brand mx-auto" href="#">División de Estudios Profesionales</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        @if (Route::has('login'))
                                @auth
                                    <a class="nav-link" href="{{ url('/home') }}">INICIO</a>
                                @else
                                    <a class="nav-link" href="{{ route('login') }}"><strong>INICIAR SESIÓN</strong></a>
                                @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <section class="content">
                <div class="title m-b-md">
                    <div id="carouselPhoto" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselPhoto" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselPhoto" data-slide-to="1"></li>
                          <li data-target="#carouselPhoto" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{ asset('dist/img/photo1.png') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Residencias Profesionales</h5>
                              <p>División de Estudios Profesionales</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="{{ asset('dist/img/photo2.png') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Titulación</h5>
                              <p>División de Estudios Profesionales</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="{{ asset('dist/img/photo4.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Actividades Complementarias</h5>
                              <p>División de Estudios Profesionales</p>
                            </div>
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselPhoto" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselPhoto" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>
            </section>

        </div>
    </body>
</html>
