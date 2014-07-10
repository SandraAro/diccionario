<h2>Editar gesto <strong>{{ $gesture->titulo }}</strong></h2>
<hr/>
<form action="{{ url('gestures/' . $gesture->id_gesto . '/update') }}" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="large-6 columns">
            <label>Título</label>
            <input type="text" name="titulo" placeholder="Título" value="{{ $gesture->titulo }}" required/>
            <label>Definición</label>
            <textarea placeholder="Definición" name="definicion" required style="height: 180px">{{ $gesture->definicion }}</textarea>
        </div>
        <div class="large-6 columns">
            <label>Imagen principal</label>
            <div class="text-center">
                <img src="{{ $gesture->url_imagen }}" style="width: 80px">
            </div>
            <input class="file-input" type="file" name="main_image" accept="image/*" />
            <label>Video</label>
            <div class="text-center" style="margin-bottom: 10px">
                <video src="{{ $gesture->url_video }}" style="width: 80px"></video>
            </div>
            <input class="file-input" type="file" name="video" accept="video/mp4" />
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>Categoría a la que pertenece</label>
            <select name="categoria">
                @if(isset($categories))
                @foreach ($categories as $category)
                <option value="{{ $category->id_categoria }}" {{ ($category->id_categoria == $gesture->id_categoria) ? 'selected' : '' }}>
                    {{ urldecode($category->nombre) }}
                </option>
                @endforeach
                @endif
            </select>
            <fieldset>
                <legend>Ejemplos</legend>
                <ul id="lista-ejemplos" class="small-block-grid-1 large-block-grid-2">
                    @foreach ($gesture->examples as $key => $example)
                    <li id="ejemplo{{ $key }}" class="ejemplo">
                        <label>Título</label>
                        <input type="text" name="ej_ejemplos[{{ $key }}][titulo]" value="{{ $example->titulo }}" placeholder="Título"/>
                        <label>Imagen</label>
                        <div class="text-center" style="margin-bottom: 10px">
                            <img src="{{ $example->url_imagen }}" style="width: 80px">
                        </div>
                        <input type="file" name="ej_imagenes[{{ $key }}]" accept="image/*"/>
                        <input type="hidden" name="ej_ejemplos[{{ $key }}][id]" value="{{ $example->id_ejemplo }}" />
                        <input id="checkbox{{ $key }}" type="checkbox" name="ej_ejemplos[{{ $key }}][eliminar]"><label class="rojo" for="checkbox{{ $key }}">Eliminar</label>
                    </li>
                    @endforeach
                    @for ($i = count($gesture->examples); $i < 2; $i++)
                    <li id="ejemplo{{ $i }}" class="ejemplo">
                        <label>Título</label>
                        <input type="text" name="ej_titulos[]" placeholder="Título"/>
                        <label>Imagen</label>
                        <input type="file" name="ej_imagenes_n[]" accept="image/*"/>
                    </li>
                    @endfor
                </ul>
            </fieldset>
            <div class="text-right">
                <input type="submit" class="small success radius button" value="Guardar cambios" />
                <a class="small radius button" onclick="close_modal($(this))">Cancelar</a>
            </div>
        </div>
    </div>
</form>
<a class="close-reveal-modal">&#215;</a>