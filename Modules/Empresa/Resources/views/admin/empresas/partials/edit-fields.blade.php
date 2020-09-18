<div class="box-body">
    <p>
        {!! Form::normalInput('nombre', 'Nombre', $errors, $empresa) !!}
        {!! Form::normalInput('rubro', 'Rubro', $errors, $empresa) !!}
        {!! Form::normalInput('direccion', 'Dirección', $errors, $empresa) !!}
        {!! Form::normalInput('telefono', 'Teléfono', $errors, $empresa) !!}
        {!! Form::normalInput('email', 'Email', $errors, $empresa) !!}
        {!! Form::normalInput('web', 'Web (incluyendo el http://)', $errors, $empresa) !!}
        {!! Form::normalInput('mapa', 'Google Maps (URL)', $errors, $empresa) !!}
        <small>Para insertar un mapa desde Google Maps, se debe elegir la opción "Compartir" y luego "Insertar Mapa", el código proporcionado debe ser copiado.</small>
    </p>

    <div class='form-group dropdown'>

    <label for='pais_id'>País</label>
        <select class="form-control" id="pais_id" name="pais_id">


            <option value="">--</option>

            @foreach ($paises as $pais)

                @if ($pais->id == $empresa->pais_id)

                    <option value="{{$empresa->pais_id}}" selected="">{{$empresa->pais->nombre}}</option>

                @else

                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>

                @endif

            @endforeach

        </select>

    <label for='ciudad_id'>Ciudad</label>
        <select class="form-control" id="ciudad_id" name="ciudad_id">

            <option value="">--</option>

            @foreach ($ciudades as $ciudad)

                @if ($ciudad->id == $empresa->ciudad_id)
              
                    <option value="{{$empresa->ciudad_id}}" class="{{$empresa->ciudad->pais_id}}" selected="">{{$empresa->ciudad->nombre}}</option>

                @else


                    <option value="{{$ciudad->id}}" class="{{$ciudad->pais_id}}">{{$ciudad->nombre}}</option>

                @endif

            @endforeach

        </select>

    </div>

    <div class='form-group dropdown'>

    <label for='subcategoria_id'>Categorias</label>
        <select class="form-control" id="categoria_id" name="categoria_id">


            <option value="">--</option>

            @foreach ($categorias as $categoria)

            @if ($empresa->subcategoria->categoria_id == $categoria->id)

            <option value="{{$empresa->subcategoria->categoria_id}}" selected>{{$empresa->subcategoria->categoria->nombre}}</option>

            @else

              <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>

            @endif  

            @endforeach

        </select>

    <label for='subcategoria_id'>Subcategorias</label>
        <select class="form-control" id="subcategoria_id" name="subcategoria_id">


            <option value="">--</option>

            @foreach ($subcategorias as $subcategoria)

                @if ($subcategoria->id == $empresa->subcategoria_id)
                
                    <option value="{{$empresa->subcategoria_id}}" class="{{$empresa->subcategoria->categoria_id}}" selected>{{$empresa->subcategoria->nombre}}</option>

                @else

                    <option value="{{$subcategoria->id}}" class="{{$subcategoria->categoria_id}}">{{$subcategoria->nombre}}</option>

                @endif

            @endforeach

        </select>

        @if(count($errors))
            <div class="{{ $errors->first('subcategoria_id') }}" style="color: #ff0000;">Se debe seleccionar una Subcategoria</div>
        @endif

    <label for='subsubcategoria_id'>Subsubcategorias</label>
        <select class="form-control" id="subsubcategoria_id" name="subsubcategoria_id">

            <option value="">--</option>

            @foreach ($subsubcategorias as $subsubcategoria)

                @if ($subsubcategoria->id == $empresa->subsubcategoria_id)

                    <option value="{{$empresa->subsubcategoria_id}}" class="{{$empresa->subsubcategoria->subcategoria_id}}" selected>{{$empresa->subsubcategoria->nombre}}</option>

                @else

                    <option value="{{$subsubcategoria->id}}" class="{{$subsubcategoria->subcategoria_id}}">{{$subsubcategoria->nombre}}</option>

                @endif

            @endforeach

        </select>

    </div>

    @include('media::admin.fields.file-link', [
        'entityClass' => 'Modules\\\\Empresa\\\\Entities\\\\Empresa',
        'entityId' => $empresa->id,
        'zone' => 'imagen'
      ])

</div>
