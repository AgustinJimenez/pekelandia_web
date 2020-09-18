@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('eventos::eventos.title.create eventos') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.eventos.eventos.index') }}">{{ trans('eventos::eventos.title.eventos') }}</a></li>
        <li class="active">{{ trans('eventos::eventos.title.create eventos') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    {!! Theme::style('css/vendor/bootstrap-datetimepicker.min.css') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.eventos.eventos.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('eventos::admin.eventos.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.eventos.eventos.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
  {!! Theme::script('js/vendor/moment.js') !!}
  {!! Theme::script('js/vendor/es.js') !!}
  {!! Theme::script('js/vendor/bootstrap-datetimepicker.min.js') !!}
  {!! Theme::script('js/vendor/bootstrap-datetimepicker.es.js') !!}
    <script type="text/javascript">
        $( document ).ready(function() {

          $('#fecha').datetimepicker({
              format: 'YYYY-MM-DD',
              locale:'es'
              //autoclose:true
          });

          $('#fecha').data("DateTimePicker");

            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.eventos.eventos.index') ?>" }
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
