<h2>Editar categoría <strong>{{ $category->nombre }}</strong></h2>
<hr/>
<form action="{{ url('categories/' . $category->id_categoria . '/update') }}" method="post" enctype="multipart/form-data">
    <label>Título</label>
    <input type="text" name="titulo" placeholder="Título" value="{{ $category->nombre }}" required />
    <label>Imágen</label>
    <div class="text-center">
        <img src="{{ $category->url_imagen }}" style="width: 80px">
    </div>
    <input type="file" name="imagen" accept="image/*" />
    <label>Categoría a la que pertenece</label>
    <select name="categoria_padre" required>
        <option value="null">Ninguna</option>
        @if(isset($categories))
        @foreach ($categories as $categ)
        <option value="{{ $categ->id_categoria }}" {{ ($categ->id_categoria == $category->id_categoria_padre) ? 'selected' : '' }}>
            {{ urldecode($categ->nombre) }}
        </option>
        @endforeach
        @endif
    </select>
    <div class="text-right">
        <input type="submit" class="small success radius button" value="Guardar cambios" />
        <a class="small radius button" onclick="close_modal($(this))">Cancelar</a>
    </div>
</form>
<a class="close-reveal-modal">&#215;</a>