@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('articulos::articulos.title.articulos') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('articulos::articulos.title.articulos') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.articulos.articulos.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('Crear artículo') }}
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
                            <th>{{ trans('Titulo') }}</th>
                            <th>{{ trans('Fecha de creación') }}</th>
                            <th>{{ trans('Mostrar') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($articulos)): ?>
                        <?php foreach ($articulos as $articulos): ?>
                        <tr>
                            <td>
                                <a href="{{ route('admin.articulos.articulos.edit', [$articulos->id]) }}">
                                    {{ $articulos->id }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.articulos.articulos.edit', [$articulos->id]) }}">
                                    {{ $articulos->titulo }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.articulos.articulos.edit', [$articulos->id]) }}">
                                    {{ $articulos->created_at->format('d-m-Y') }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.articulos.articulos.edit', [$articulos->id]) }}">
                                    @if ($articulos->mostrar == 1)
                                      Si
                                    @else
                                      No
                                    @endif
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.articulos.articulos.edit', [$articulos->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.articulos.articulos.destroy', [$articulos->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('ID') }}</th>
                            <th>{{ trans('Titulo') }}</th>
                            <th>{{ trans('Fecha de creación') }}</th>
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
        <dd>{{ trans('articulos::articulos.title.create articulos') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.articulos.articulos.create') ?>" }
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
