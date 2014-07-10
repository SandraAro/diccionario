<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$keywords}} | Buscar en el Diccionario en señas</title>
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
        <div class="medium-4 large-6 columns">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">Ir al inicio</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <h3 class="bold category-title">Resultados para "{{$keywords}}"</h3>
            <div id="lista-gestos">
                <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
                    @foreach ($categories as $category)
                    <li>
                        <a href="{{ url('categories') . '/' . $category->id_categoria }}">
                            <div class="panel category-panel result">
                                <div class="text-center">
                                    <p class="result">Categoría</p>
                                    <img class="img-categoria" src="{{ url($category->url_imagen) }}">
                                    <h3 class="bold">{{ urldecode($category->nombre) }}</h3>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                    @foreach ($gestures as $gesture)
                    <li>
                        <a href="{{ url('gestures') . '/' . $gesture->id_gesto }}" target="_self">
                            <div class="panel gesture-panel result">
                                <div class="text-center">
                                    <p class="result">Gesto</p>
                                    <img class="img-gesto" src="{{ url($gesture->url_imagen) }}">
                                    <h3 class="bold">{{ urldecode($gesture->titulo) }}</h3>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                    @if (count($categories) == 0 && count($gestures) == 0)
                    <h5 class="text-center">No se encontró ninguna categoría o gesto</h5>
                    @endif
                </ul>
            </div>
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
</body>
</html>
