@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Newsletter - Detalle de e-mail') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.newsletter.emails.index') }}">{{ trans('newsletter::emails.title.emails') }}</a></li>
        <li class="active">{{ trans('newsletter::emails.title.edit emails') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    <style>
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
        background-color: #ffffff;
        opacity: 1;
    }
    #listemail {
        cursor: pointer;
    }
    .modal-content  {
        -webkit-border-radius: 5px !important;
        -moz-border-radius: 5px !important;
        border-radius: 5px !important; 
    }
    </style>
@stop

@section('content')

<section class="content">

    <div class="row">

    <div class="col-xs-12">

        <div class="box-body">

                    <div class="form-group row">
                      <div class="col-md-10">
                      @if ($email->grupo_id != null)
                      <label for="email" class="form-check-label">Grupo:</label>
                        <input readonly class="form-control" type="email" id="email" name="email" placeholder="{{$email->grupo->nombre}}"><a id="listemail" class="form-text text-muted" data-toggle="modal" data-target=".bd-example-modal-lg">[Lista de emails]</a>
                      @else
                        <label for="email" class="form-check-label">Email:</label>
                        <input readonly class="form-control" type="email" id="email" name="email" placeholder="{{$email->email}}">
                      @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-10">
                      <label for="asunto" class="form-check-label">Asunto:</label>
                        <input readonly class="form-control" type="text" id="asunto" name="asunto" placeholder="{{$email->asunto}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-10">
                      <label for="asunto" class="form-check-label">Fecha:</label>
                        <input readonly class="form-control" type="text" id="asunto" name="asunto" placeholder="{{$email->created_at->format('d-m-Y')}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-10">
                      <label for="mensaje" class="form-check-label">Contenido:</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12" style="background-color: #ffffff;padding: 10px;">
                        <div class="text-center"> {!!$email->mensaje!!} </div>
                      </div>
                    </div>

                @if ($email->grupo_id != null)
                <!-- Modal Lista de Emails -->
                <div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <h2 style="padding: 5px;">Newsletter - Lista de e-mails enviados</h2>
                        <table class="table table-responsive table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Email</th>
                              <th>Grupo</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i=1 ?>
                        @foreach ($listemails as $listemail)
                            <tr>
                              <th>{{$i++}}</th>
                              <th scope="row">{{$listemail->id}}</th>
                              <td>{{$listemail->nombre}}</td>
                              <td>{{$listemail->email}}</td>
                              <td>{{$listemail->grupo->nombre}}</td>
                            </tr>
                        @endforeach
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
                @endif

        </div>
    </div>

    </div>

</section>


@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.newsletter.emails.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@stop
