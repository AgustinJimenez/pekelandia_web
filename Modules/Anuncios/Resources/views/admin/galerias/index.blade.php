@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('anuncios::galerias.title.galerias') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('anuncios::galerias.title.galerias') }}</li>
    </ol>
@stop

@section('styles')
    <style type="text/css">
        .table>tbody>tr>td {vertical-align: middle;}
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.anuncios.galeria.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('Crear galería') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('ID') }}</th>
                            <th>{{ trans('Título') }}</th>
                            <th>{{ trans('Imagen') }}</th>
                            <th>{{ trans('Orden') }}</th>
                            <th>{{ trans('Mostrar') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($galerias)): ?>
                        <?php foreach ($galerias as $galeria): ?>
                        <tr>
                            <td>
                                <a href="{{ route('admin.anuncios.galeria.edit', [$galeria->id]) }}">
                                    {{ $galeria->id }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.anuncios.galeria.edit', [$galeria->id]) }}">
                                    {{ $galeria->titulo }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.anuncios.galeria.edit', [$galeria->id]) }}">
                                    <img src="{{ $galeria->imagen }}" style="width: 150px;height: auto;">
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.anuncios.galeria.edit', [$galeria->id]) }}">
                                    {{ $galeria->orden }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.anuncios.galeria.edit', [$galeria->id]) }}">
                                    @if ($galeria->mostrar == 1)
                                        Si
                                    @else
                                        No
                                    @endif
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.anuncios.galeria.edit', [$galeria->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.anuncios.galeria.destroy', [$galeria->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('ID') }}</th>
                            <th>{{ trans('Título') }}</th>
                            <th>{{ trans('Imagen') }}</th>
                            <th>{{ trans('Orden') }}</th>
                            <th>{{ trans('Mostrar') }}</th>
                            <th>{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('anuncios::galerias.title.create galeria') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.anuncios.galeria.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "asc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@stop
