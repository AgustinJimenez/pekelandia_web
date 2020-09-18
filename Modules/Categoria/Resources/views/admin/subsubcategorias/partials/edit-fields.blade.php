<div class="box-body">
    <p>
        {!! Form::normalInput('nombre', 'Nombre', $errors, $subsubcategoria) !!}
        <div class='form-group dropdown'>

    <label for='subcategoria_id'>Subcategorias</label>
        <select class="form-control" id="subcategoria_id" name="subcategoria_id">

            @foreach ($subcategorias as $subcategoria)

            	@if ($subcategoria->id == $subsubcategoria->subcategoria_id)

            	<option value="{{$subcategoria->id}}" selected="">{{$subcategoria->nombre}}</option>

            	@else

              	<option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>

              	@endif

            @endforeach

        </select>

    </div>
    </p>
</div>
