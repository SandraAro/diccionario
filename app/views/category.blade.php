<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ urldecode($category->nombre) }} | Diccionario en señas</title>
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
                <li><a href="{{ url('/') }}">Categorías</a></li>
                <li class="current"><a href="#">{{ urldecode($category->nombre) }}</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <!--<h3><a href="{{ url('/') }}"><i class="fa fa-arrow-left fa-lg"></i> atrás</a> | <span class="bold">{{ ucfirst(urldecode($category->nombre)) }}</span></h3>-->
            <h3 class="bold category-title">{{ ucfirst(urldecode($category->nombre)) }}</h3>
            <div id="lista-gestos">
                <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
                    @foreach ($category->categories as $subcategory)
                    <li>
                        <!--<a href="#" data-orbit-link="headline-1" data-reveal-id="gestoModal">-->
                        <a href="{{ url('categories') . '/' . $subcategory->id_categoria }}" target="_self">
                            <div class="panel category-panel">
                                <div class="text-center">
                                    <img class="img-categoria" src="{{ url($subcategory->url_imagen) }}">
                                    <h3 class="bold">{{ urldecode($subcategory->nombre) }}</h3>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                    @foreach ($category->gestures as $gesture)
                    <li>
                        <!--<a href="#" data-orbit-link="headline-1" data-reveal-id="gestoModal">-->
                        <a href="{{ url('gestures') . '/' . $gesture->id_gesto }}" target="_self">
                            <div class="panel gesture-panel">
                                <div class="text-center">
                                    <img class="img-gesto" src="{{ url($gesture->url_imagen) }}">
                                    <h3 class="bold">{{ urldecode($gesture->titulo) }}</h3>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div id="gestoModal" class="reveal-modal" data-reveal>
        <ul class="gesto-slider" data-orbit>
            <li data-orbit-slide="headline-1">
                <div class="slide-content">
                    <div class="row">
                        <div class="large-4 columns">
                            <div class="text-center">
                                <img src="http://placehold.it/300x400&text=Video">
                            </div>
                        </div>
                        <div class="large-8 columns">
                            <h2>Título del gesto 1</h2>
                            <hr/>
                            <h4>Ejemplo</h4>
                            <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
                                <li>
                                    <div class="text-center">
                                        <img src="http://placehold.it/250x150&text=Imagen 1">
                                        <h5>Título 1</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <img src="http://placehold.it/250x150&text=Imagen 2">
                                        <h5>Título 2</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <img src="http://placehold.it/250x150&text=Imagen 3">
                                        <h5>Título 3</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li data-orbit-slide="headline-2">
                <div class="slide-content">
                    <div class="row">
                        <div class="large-4 columns">
                            <div class="text-center">
                                <img src="http://placehold.it/300x400&text=Video">
                            </div>
                        </div>
                        <div class="large-8 columns">
                            <h2>Título del gesto 2</h2>
                            <hr/>
                            <h4>Ejemplo</h4>
                            <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
                                <li>
                                    <div class="text-center">
                                        <img src="http://placehold.it/250x150&text=Imagen 1">
                                        <h5>Título 1</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <img src="http://placehold.it/250x150&text=Imagen 2">
                                        <h5>Título 2</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <img src="http://placehold.it/250x150&text=Imagen 3">
                                        <h5>Título 3</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <a class="close-reveal-modal">&#215;</a>
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
