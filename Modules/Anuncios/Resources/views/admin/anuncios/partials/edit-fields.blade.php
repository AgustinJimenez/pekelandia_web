<div class="box-body">
    <p>

        @include('media::admin.fields.file-link', [
        'entityClass' => 'Modules\\\\Anuncios\\\\Entities\\\\Anuncios',
        'entityId' => $anuncios->id,
        'zone' => 'imagen'
        ])

      {!! Form::normalInput('vinculo', 'Vínculo', $errors, $anuncios) !!}

	<div class="form-group">
	  <label for="grupo" class="form-check-label">Vista:</label>
	    <select class="form-control" id="vista" name="vista">
	    	@if ($anuncios->vista == 'Inicio')
		    	<option value="Inicio" selected>Inicio</option>
		    	<option value="Banner">Banner Superior</option>
		    	<option value="Articulos">Artículos</option>
		    	<option value="Empresas">Empresas</option>
		    	<option value="Eventos">Eventos</option>
		    	<option value="Promociones">Promociones</option>
		    	<option value="Revistas">Revistas</option>
		    	<option value="Post">Post Individual</option>
		    @elseif ($anuncios->vista == 'Banner')
		    	<option value="Inicio">Inicio</option>
		    	<option value="Banner" selected="">Banner Superior</option>
		    	<option value="Articulos">Artículos</option>
		    	<option value="Empresas">Empresas</option>
		    	<option value="Eventos">Eventos</option>
		    	<option value="Promociones">Promociones</option>
		    	<option value="Revistas">Revistas</option>
		    	<option value="Post">Post Individual</option>
	    	@elseif ($anuncios->vista == 'Articulos')
		    	<option value="Inicio">Inicio</option>
		    	<option value="Banner">Banner Superior</option>
		    	<option value="Articulos" selected="">Artículos</option>
		    	<option value="Empresas">Empresas</option>
		    	<option value="Eventos">Eventos</option>
		    	<option value="Promociones">Promociones</option>
		    	<option value="Revistas">Revistas</option>
		    	<option value="Post">Post Individual</option>
		    @elseif ($anuncios->vista == 'Empresas')
		    	<option value="Inicio">Inicio</option>
		    	<option value="Banner">Banner Superior</option>
		    	<option value="Articulos">Artículos</option>
		    	<option value="Empresas" selected="">Empresas</option>
		    	<option value="Eventos">Eventos</option>
		    	<option value="Promociones">Promociones</option>
		    	<option value="Revistas">Revistas</option>
		    	<option value="Post">Post Individual</option>
		    @elseif ($anuncios->vista == 'Eventos')
		    	<option value="Inicio">Inicio</option>
		    	<option value="Banner">Banner Superior</option>
		    	<option value="Articulos">Artículos</option>
		    	<option value="Empresas">Empresas</option>
		    	<option value="Eventos" selected="">Eventos</option>
		    	<option value="Promociones">Promociones</option>
		    	<option value="Revistas">Revistas</option>
		    	<option value="Post">Post Individual</option>
		    @elseif ($anuncios->vista == 'Promociones')
		    	<option value="Inicio">Inicio</option>
		    	<option value="Banner">Banner Superior</option>
		    	<option value="Articulos">Artículos</option>
		    	<option value="Empresas">Empresas</option>
		    	<option value="Eventos">Eventos</option>
		    	<option value="Promociones" selected="">Promociones</option>
		    	<option value="Revistas">Revistas</option>
		    	<option value="Post">Post Individual</option>
		    @elseif ($anuncios->vista == 'Revistas')
		    	<option value="Inicio">Inicio</option>
		    	<option value="Banner">Banner Superior</option>
		    	<option value="Articulos">Artículos</option>
		    	<option value="Empresas">Empresas</option>
		    	<option value="Eventos">Eventos</option>
		    	<option value="Promociones">Promociones</option>
		    	<option value="Revistas" selected="">Revistas</option>
		    	<option value="Post">Post Individual</option>
		    @elseif ($anuncios->vista == 'Post')
		    	<option value="Inicio">Inicio</option>
		    	<option value="Banner">Banner Superior</option>
		    	<option value="Articulos">Artículos</option>
		    	<option value="Empresas">Empresas</option>
		    	<option value="Eventos">Eventos</option>
		    	<option value="Promociones">Promociones</option>
		    	<option value="Revistas">Revistas</option>
		    	<option value="Post" selected="">Post Individual</option>
		    @endif
	    </select>
	</div>

	<div class="form-group">
		  <label for="orden" class="form-check-label">Orden:</label>
		    <select class="form-control" id="orden" name="orden">
		    	<option value="1" class="Inicio">1</option>
		    	<option value="2" class="Inicio">2</option>
		    	<option value="3" class="Inicio">3</option>
		    	<option value="4" class="Inicio">4</option>
		    	<option value="1" class="Banner">1</option>
		    	<option value="1" class="Articulos">1</option>
		    	<option value="2" class="Articulos">2</option>
		    	<option value="3" class="Articulos">3</option>
		    	<option value="4" class="Articulos">4</option>
		    	<option value="1" class="Eventos">1</option>
		    	<option value="2" class="Eventos">2</option>
		    	<option value="3" class="Eventos">3</option>
		    	<option value="4" class="Eventos">4</option>
		    	<option value="1" class="Empresas">1</option>
		    	<option value="2" class="Empresas">2</option>
		    	<option value="3" class="Empresas">3</option>
		    	<option value="4" class="Empresas">4</option>
		    	<option value="5" class="Empresas">5</option>
		    	<option value="6" class="Empresas">6</option>
		    	<option value="1" class="Promociones">1</option>
		    	<option value="2" class="Promociones">2</option>
		    	<option value="3" class="Promociones">3</option>
		    	<option value="4" class="Promociones">4</option>
		    	<option value="1" class="Revistas">1</option>
		    	<option value="2" class="Revistas">2</option>
		    	<option value="1" class="Post">1</option>
		    	<option value="2" class="Post">2</option>
		    	<option value="3" class="Post">3</option>
		    	<option value="4" class="Post">4</option>
		    </select>
		</div>

      {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors, $anuncios) !!}

    </p>
</div>
