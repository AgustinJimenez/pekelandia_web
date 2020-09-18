@extends('layouts.master')

@section('content-header')
    <h1>
        {{-- {{ trans('empresa::empresas.title.create empresa') }} --}}
        {{ trans('Guía Infantil') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.empresa.empresa.index') }}">{{ trans('empresa::empresas.title.empresas') }}</a></li>
        {{-- <li class="active">{{ trans('empresa::empresas.title.create empresa') }}</li> --}}
        <li class="active">{{ trans('guia infantil') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    
@stop

@section('content')
    {!! Form::open(['route' => ['admin.empresa.empresa.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('empresa::admin.empresas.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.empresa.empresa.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
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
{!! Theme::script('js/vendor/jquery.chained.min.js') !!}
    <script type="text/javascript">
        $( document ).ready(function() {

            var url = 'http://localhost:8000/es/api/';
            // var url = 'http://URL DEL SERVIDOR/es/api/';

            $("#subcategoria_id").chained("#categoria_id");

            $("#subsubcategoria_id").chained("#subcategoria_id");

            $("#ciudad_id").chained("#pais_id");

            $("#subcategoria_id").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
                $("#subsubcategoria_id").prop('required',false);
                console.log($(this).val());
              
              $.ajax({ /* THEN THE AJAX CALL */
                type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
                url: url + "tieneHijos", /* PAGE WHERE WE WILL PASS THE DATA */
                data: {'subcategoria_id':$(this).val()}, /* THE DATA WE WILL BE PASSING */
                success: function(result){ /* GET THE TO BE RETURNED DATA */
                  console.dir(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
                  if(result.msg){
                    console.log(result.msg);
                    //$("#subsubcategoria_id").required = true;
                    $("#subsubcategoria_id").prop('required',true);
                  }
                }
              });

            });
            
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.empresa.empresa.index') ?>" }
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
