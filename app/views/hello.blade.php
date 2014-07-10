<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Diccionario en señas | Fundación Amigos del Gesto</title>
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

<div id="container" class="row">
    <div class="large-12 columns">
        <h3 class="bold category-title">Categorías</h3>
        <div id="lista-categorias">
            <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
                @foreach ($categories as $category)
				@if($category->id_categoria_padre == 0)
                <li>
                    <!--<a href="#" data-reveal-id="categoriaModal">-->
                    <a href="{{ url('categories') . '/' . $category->id_categoria }}">
                        <div class="panel category-panel">
                            <div class="text-center">
                                <img class="img-categoria" src="{{ url($category->url_imagen) }}">
                                <h3 class="bold">{{ urldecode($category->nombre) }}</h3>
                            </div>
                        </div>
                    </a>
                </li>
				@endif
                @endforeach
            </ul>
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
            timer_speed: 1000,
            pause_on_hover: true,
            resume_on_mouseout: false,
            animation_speed: 500,
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
