<div class="box-body">
    <p>
        {!! Form::normalInput('nombre', 'Nombre', $errors) !!}
        {!! Form::normalInput('email', 'Email', $errors) !!}

        <label for='grupo_id'>Grupo</label>
        <select class="form-control" id="grupo_id" name="grupo_id">

            @foreach ($grupos as $grupo)

            @if ($grupo->nombre != "Todos")

              	<option value="{{$grupo->id}}">{{$grupo->nombre}}</option>

            @endif

            @endforeach

        </select>

    </p>
</div>
