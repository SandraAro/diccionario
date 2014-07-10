<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel administrativo | Diccionario de gestos</title>
    <link rel="stylesheet" href="{{ asset('css/foundation.css') }}" />
    <link href='http://fonts.googleapis.com/css?family=Bowlby+One+SC|Holtwood+One+SC|Rammetto+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <script src="{{ asset('js/modernizr.js') }}"></script>
</head>
<body>
<header>
    <div class="row">
        <!--<div class="medium-2 columns text-center">
            <img class="logo" src="{{ asset('img/four-hands-gray.png') }}" alt="Fundación Amigos del Gesto"/>
        </div>-->
        <div class="large-7 columns">
            <h6 id="foundation-name" class="white">Fundación Amigos del Gesto | Diccionario en señas</h6>
            <h1 class="bowlby-font white">Panel administrativo</h1>
        </div>
        <div class="large-5 columns text-right">
            <a id="btn-a-diccionario" class="tiny radius button" href="{{ url('/') }}">Regresar al Diccionario</a>
        </div>
    </div>
</header>

<div id="container" class="row">
    <div class="large-12 columns">
        <a class="small radius button" data-reveal-id="nuevaCategoriaModal"><i class="fa fa-plus"></i> Agregar categoría</a>
        @if(isset($categories))
        @if(count($categories) > 0)
        <a class="small success radius button" data-reveal-id="nuevoGestoModal"><i class="fa fa-plus"></i> Agregar gesto</a>
        @endif
        @endif
        <h3 class="bold gray">Categorías</h3>
        <dl class="accordion" data-accordion>
            @if(isset($categories))
            @foreach ($categories as $pos => $category)
            <dd>
                <a href="#panel{{ $pos + 1 }}">{{ urldecode($category->nombre) }}</a>
                <div id="panel{{ $pos + 1 }}" class="content">
                    <div class="text-right">
                        <a href="{{ url('categories/' . $category->id_categoria . '/edit' ) }}" class="tiny radius button" data-reveal-id="editarCategoriaModal" data-reveal-ajax="true"><i class="fa fa-pencil"></i> Editar categoría</a>
                        @if ($category->status)
                        <a href="{{ url('categories/' . $category->id_categoria . '/delete') }}" class="tiny alert radius button" onclick="deleteCategory({{ $category->id_categoria }}, '{{ $category->nombre }}')">{{ (count($category->gestures)) ? '<i class="fa fa-minus-circle"></i> Desactivar' : '<i class="fa fa-times"></i> Eliminar' }} categoría</a>
                        @else
                        <a href="{{ url('categories/' . $category->id_categoria . '/delete') }}" class="tiny success radius button" onclick="deleteCategory({{ $category->id_categoria }}, '{{ $category->nombre }}')"><i class="fa fa-plus-circle"></i> Activar categoría</a>
                        @endif
                    </div>
                    <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
                        @foreach ($category->gestures as $gesture)
                        <li>
                            <div class="panel text-center">
                                <a class="negro" href="{{ url('gestures/' . $gesture->id_gesto . '/edit' ) }}" data-reveal-id="editarGestoModal" data-reveal-ajax="true">
                                    {{ urldecode($gesture->titulo) }}
                                </a>
                                <div class="delete-icon">
                                    <a href="{{ url('gestures/' . $gesture->id_gesto . '/edit' ) }}" data-reveal-id="editarGestoModal" data-reveal-ajax="true">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="rojo" onclick="deleteGesture({{ $gesture->id_gesto }}, '{{ $gesture->titulo }}')"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </dd>
            @endforeach
            @endif
        </dl>
    </div>
</div>

<div id="nuevaCategoriaModal" class="small reveal-modal" data-reveal>
    <h2>Nueva categoría</h2>
    <hr/>
    <form action="{{ url('categories') }}" method="post" enctype="multipart/form-data">
        <label>Título</label>
        <input type="text" name="titulo" placeholder="Título" required />
        <label>Imagen</label>
        <input type="file" name="imagen" accept="image/*"/>
        <label>Categoría a la que pertenece</label>
        <select name="categoria_padre" required>
            <option value="null">Ninguna</option>
            @if(isset($categories))
            @foreach ($categories as $category)
            <option value="{{ $category->id_categoria }}">{{ urldecode($category->nombre) }}</option>
            @endforeach
            @endif
        </select>
        <div class="text-right">
            <input type="submit" class="small success radius button" value="Guardar" />
            <a class="small radius button" onclick="close_modal($(this))">Cancelar</a>
        </div>
    </form>
    <a class="close-reveal-modal">&#215;</a>
</div>

<div id="editarCategoriaModal" class="small reveal-modal" data-reveal>

</div>

@if(isset($categories))
@if(count($categories) > 0)
<div id="nuevoGestoModal" class="medium reveal-modal" data-reveal>
    <h2>Nuevo gesto</h2>
    <hr/>
    <form action="{{ url('gestures') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="large-6 columns">
                <label>Título</label>
                <input type="text" name="titulo" placeholder="Título" required />
                <label>Definición</label>
                <textarea placeholder="Definición" name="definicion" required></textarea>
            </div>
            <div class="large-6 columns">
                <label>Imágen principal</label>
                <input class="file-input" type="file" name="main_image" accept="image/*"/>
                <label>Video</label>
                <input class="file-input" type="file" name="video" accept="video/mp4" required/>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <label>Categoría a la que pertenece</label>
                <select name="categoria" required>
                    @if(isset($categories))
                    @foreach ($categories as $categories)
                    <option value="{{ $categories->id_categoria }}">{{ urldecode($categories->nombre) }}</option>
                    @endforeach
                    @endif
                </select>
                <fieldset>
                    <legend>Ejemplos</legend>
                    <ul id="lista-ejemplos" class="small-block-grid-1 large-block-grid-2">
                        <li id="ejemplo1" class="ejemplo">
                            <label>Título</label>
                            <input type="text" name="ej_titulos[]" placeholder="Título"/>
                            <label>Imágen</label>
                            <input type="file" name="ej_imagenes[]" accept="image/*"/>
                        </li>
                        <li id="ejemplo2" class="ejemplo">
                            <label>Título</label>
                            <input type="text" name="ej_titulos[]" placeholder="Título"/>
                            <label>Imágen</label>
                            <input type="file" name="ej_imagenes[]" accept="image/*"/>
                        </li>
                    </ul>
                </fieldset>
                <div class="text-right">
                    <input type="submit" class="small success radius button" value="Guardar" />
                    <a class="small radius button" onclick="close_modal($(this))">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
    <a class="close-reveal-modal">&#215;</a>
</div>
@endif
@endif

<div id="editarGestoModal" class="medium reveal-modal" data-reveal>

</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/foundation.min.js') }}"></script>
<script>
    $(document).foundation();

    var ejemplos = -1;

    $('#btn-nuevo-ejemplo').click(function(){
        ejemplos = ejemplos + 1;

        var html_ejemplo =
            '<li id="ejemplo' + ejemplos + '" class="ejemplo">' +
                '<label>Título</label>' +
                '<input type="text" name="ej_titulos[' + ejemplos + ']" placeholder="Título" required/>' +
                '<label>Imágen</label>' +
                '<input type="file" name="ej_imagenes[' + ejemplos + ']" accept="image/*" required/>' +
                '</li>';
        $('#lista-ejemplos').append(html_ejemplo);

        if (ejemplos >= 0)
            $('#btn-eliminar-ejemplo').css('display', 'inline-block');
    });

    $('#btn-eliminar-ejemplo').click(function(){
        if (ejemplos >= 0){
            ejemplos = ejemplos - 1;
            $('.ejemplo').last().remove();

            if (ejemplos == -1)
                $('#btn-eliminar-ejemplo').css('display', 'none');
        }
    });

    $('#btn-eliminar-ejemplo').css('display', 'none');

    function deleteGesture(id, title){
        if (confirm('¿Desea eliminar el gesto ' + title + '?')) {
            location.href = '{{ url('gestures') }}/' + id + '/delete';
        }
    }

    function close_modal(modal){
        modal.closest('.reveal-modal').foundation('reveal', 'close');
    };
</script>
</body>
</html>
