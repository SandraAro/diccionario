<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $gesture->titulo }} | Diccionario en señas</title>
    <link rel="stylesheet" href="{{ asset('css/foundation.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/amigosdelgesto.css') }}" />
    <link href='http://fonts.googleapis.com/css?family=Bowlby+One+SC|Holtwood+One+SC|Rammetto+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <script src="{{ asset('js/modernizr.js') }}"></script>
</head>
<body class="pattern-background">

<header>
    <div class="row">
        <div class="large-6 columns">
            <img class="logo" src="{{ asset('img/logo-hands.png') }}" alt="Fundación Amigos del Gesto"/>
            <div style="float: left">
                <h6 id="foundation-name" class="white">Fundación Amigos del Gesto</h6>
                <h1 class="bowlby-font white">Diccionario en señas</h1>
            </div>
        </div>
        <div class="large-6 columns">
            <form id="search-form" action="{{ url('search') }}" method="get">
                <div class="row collapse">
                    <div class="small-8 columns">
                        <input id="search-input" name="q" type="text" placeholder="Categoría o gesto..." required/>
                    </div>
                    <div class="small-4 columns">
                        <button id="search-submit" type="submit" class="button postfix radius">Buscar&nbsp;&nbsp;<i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>

<div id="container">
    <div class="row">
        <div class="medium-6 large-6 columns">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Categorías</a></li>
                <li><a href="{{ url('categories' . '/' . $category->id_categoria) }}">{{ urldecode($category->nombre) }}</a></li>
                <li class="current"><a href="#">{{ urldecode($gesture->titulo) }}</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="large-7 columns">
            <div class="text-center">
                <div class="panel panel-titulo-gesto">
                    <video src="{{ url($gesture->url_video) }}" autoplay loop="true" controls></video>
                </div>
                <div id="directional-btns" class="row">
                    <div class="large-12 columns text-center">
                        @if (!empty($previous))
                        <a href="{{ $previous->id_gesto }}" class="tiny radius button"><i class="fa fa-chevron-left"></i> {{ urldecode($previous->titulo) }}</a>
                        @endif

                        @if (!empty($next))
                        <a href="{{ $next->id_gesto }}" class="tiny radius button">{{ urldecode($next->titulo) }} <i class="fa fa-chevron-right"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="large-5 columns">
            <h2 id="gesture-title" class="bowlby-font category-title">{{ urldecode($gesture->titulo) }}</h2>
            @if (count($gesture->examples) > 0)
            <ul class="small-block-grid-1 medium-block-grid-2">
                @foreach ($gesture->examples as $example)
                <li>
                    <div class="panel panel-titulo-gesto text-center">
                        <div class="img-preview" style="background: url({{ url($example->url_imagen) }}) center center no-repeat #fff; background-size: contain">

                        </div>
                        <h5>{{ $example->titulo }}</h5>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <div class="panel panel-titulo-gesto">
                <h4 class="bold">Definición</h4>
                <p>{{ $gesture->definicion }}</p>
            </div>
            @endif
        </div>
    </div>
</div>

<div id="footer" class="row">
    <div class="large-12 columns text-right">
        <hr>
        <a id="btn-administrar" href="{{ url('admin') }}" class="gray">Administrar</a>
    </div>
</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/foundation.min.js') }}"></script>
<script>
    $(document).foundation({
        orbit: {
            animation: 'slide',
            timer_speed: 10000,
            pause_on_hover: true,
            resume_on_mouseout: false,
            animation_speed: 200,
            navigation_arrows: true,
            bullets: false,
            next_on_click: true,
            timer: false
        }
    });

    $(document).on('opened', '#gestoModal', function () {
        $(window).trigger('resize');
    });
</script>
</body>
</html>