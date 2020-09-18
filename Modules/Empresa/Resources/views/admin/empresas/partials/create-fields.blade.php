<div class="box-body">
    <p>
        {!! Form::normalInput('nombre', 'Nombre', $errors) !!}
        {!! Form::normalInput('rubro', 'Rubro', $errors) !!}
        {!! Form::normalInput('direccion', 'Dirección', $errors) !!}
        {!! Form::normalInput('telefono', 'Teléfono', $errors) !!}
        {!! Form::normalInput('email', 'Email', $errors) !!}
        {!! Form::normalInput('web', 'Web (incluyendo el http://)', $errors) !!}
        {!! Form::normalInput('mapa', 'Google Maps (URL)', $errors) !!}
        <small>Para insertar un mapa desde Google Maps, se debe elegir la opción "Compartir" y luego "Insertar Mapa", el código proporcionado debe ser copiado.</small>

    </p>

    <div class='form-group dropdown'>

    <label for='pais_id'>País</label>
        <select class="form-control" id="pais_id" name="pais_id">


            <option value="">--</option>

            @foreach ($paises as $pais)

              <option value="{{$pais->id}}">{{$pais->nombre}}</option>

            @endforeach

        </select>

    <label for='ciudad_id'>Ciudad</label>
        <select class="form-control" id="ciudad_id" name="ciudad_id">

            <option value="">--</option>

            @foreach ($ciudades as $ciudad)

              
              <option value="{{$ciudad->id}}" class="{{$ciudad->pais_id}}">{{$ciudad->nombre}}</option>

            @endforeach

        </select>

    </div>

    <div class='form-group dropdown'>

    <label for='subcategoria_id'>Categorias</label>
        <select class="form-control" id="categoria_id" name="categoria_id">


            <option value="">--</option>

            @foreach ($categorias as $categoria)

              <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>

            @endforeach

        </select>

    <label for='subcategoria_id'>Subcategorias</label>
        <select class="form-control" id="subcategoria_id" name="subcategoria_id">


            <option value="">--</option>

            @foreach ($subcategorias as $subcategoria)

              <option value="{{$subcategoria->id}}" class="{{$subcategoria->categoria_id}}">{{$subcategoria->nombre}}</option>

            @endforeach

        </select>

        @if(count($errors))
            <div class="{{ $errors->first('subcategoria_id') }}" style="color: #ff0000;">Se debe seleccionar una Subcategoria</div>
        @endif

    <label for='subsubcategoria_id'>Subsubcategorias</label>
        <select class="form-control" id="subsubcategoria_id" name="subsubcategoria_id">

            <option value="">--</option>

            @foreach ($subsubcategorias as $subsubcategoria)

              
              <option value="{{$subsubcategoria->id}}" class="{{$subsubcategoria->subcategoria_id}}">{{$subsubcategoria->nombre}}</option>

            @endforeach

        </select>

        {{-- @if(count($errors))
            <div class="{{ $errors->first('subsubcategoria_id') }}" style="color: #ff0000;">Se debe seleccionar una Subsubcategoria</div>
        @endif --}}

    </div>

    @include('media::admin.fields.new-file-link-single', [
    	'zone' => 'imagen'
	])
	
</div>
