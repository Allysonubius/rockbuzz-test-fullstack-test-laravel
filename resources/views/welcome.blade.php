<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Culinária e Sabor</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-navbar">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg static-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" id="logo" href="/">
                    <img src="{{ url("imagesPosts/logo1.png") }}" width="130" height="70" alt="">
                </a>
                <div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">

                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link">Admin</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                        @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-body">
            @yield('content')

            <div class="carrossel">
                <div id="carouselSite" data-interval="3000" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselSite" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselSite" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ url("imagesPosts/slide01.png") }}" class="img-fluid">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url("imagesPosts/slide02.png") }}" class="img-fluid">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselSite" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselSite" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </div>

            <div class="block2">
                <h2 class="title-block2">Receitas
            </div>
            <!--Posts-->

            <div class='row'>
                @foreach($postsOn as $post)
                <a href="{{ url('posts/edit/' . $post->id) }}">
                    <a class="link-detail" href="{{ url('/posts/postDetail/' . $post->id) }}">
                        <div class="col">

                            <div class="card" id="card" style="width: 20rem;">
                                <h4 class="card-text">{{ $post->title }}</h4>
                                <a class="" href="{{ url('/posts/postDetail/' . $post->id) }}">
                                    <img src="{{ url("imagesPosts/{$post->image}") }}" class="card-img-top" alt="Image" />
                                </a>
                                <p></p>
                            </div>
                        </div>
                    </a>
                    @endforeach
            </div>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" defer></script>
            <script src="{{ asset('js/app.js') }}" defer></script>
        </div>
</body>
</div>

</html>
