<div class="box-body">
    <p>
        {!! Form::normalInput('nombre', 'Nombre', $errors, $emails) !!}
        {!! Form::normalInput('email', 'Email', $errors, $emails) !!}

        <label for='grupo_id'>Grupo</label>
        <select class="form-control" id="grupo_id" name="grupo_id">

            @foreach ($grupos as $grupo)

            @if ($grupo->nombre != "Todos")

            	@if ($grupo->id == $emails->grupo_id)

            	<option value="{{$grupo->id}}" selected="">{{$grupo->nombre}}</option>

            	@else

              	<option value="{{$grupo->id}}">{{$grupo->nombre}}</option>

              	@endif
            @endif

            @endforeach

        </select>
    </p>
</div>
