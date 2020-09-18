@extends('layouts.master')

@section('content-header')
    <h1>
        {{-- {{ trans('empresa::empresas.title.empresas') }} --}}
        {{ trans('Guía Infantil') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        {{-- <li class="active">{{ trans('empresa::empresas.title.empresas') }}</li> --}}
        <li class="active">{{ trans('guia infantil') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.empresa.empresa.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('Agregar') }}
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
                            <th>{{ trans('Empresa') }}</th>
                            <th>{{ trans('Rubro') }}</th>
                            <th>{{ trans('Categoria') }}</th>
                            <th>{{ trans('Subcategoria') }}</th>
                            <th>{{ trans('Subsubcategoria') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($empresas)): ?>
                        <?php foreach ($empresas as $empresa): ?>
                        <tr>
                            <td>
                                <a href="{{ route('admin.empresa.empresa.edit', [$empresa->id]) }}">
                                    {{ $empresa->id }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.empresa.empresa.edit', [$empresa->id]) }}">
                                    {{ $empresa->nombre }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.empresa.empresa.edit', [$empresa->id]) }}">
                                    {{ $empresa->rubro }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.empresa.empresa.edit', [$empresa->id]) }}">
                                    {{ $empresa->subcategoria->categoria->nombre }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.empresa.empresa.edit', [$empresa->id]) }}">
                                    {{ $empresa->subcategoria->nombre }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.empresa.empresa.edit', [$empresa->id]) }}">
                                    {{ $empresa->subsubcategoria->nombre or "-" }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.empresa.empresa.edit', [$empresa->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.empresa.empresa.destroy', [$empresa->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('ID') }}</th>
                            <th>{{ trans('Empresa') }}</th>
                            <th>{{ trans('Categoria') }}</th>
                            <th>{{ trans('Rubro') }}</th>
                            <th>{{ trans('Subcategoria') }}</th>
                            <th>{{ trans('Subsubcategoria') }}</th>
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
        <dd>{{ trans('empresa::empresas.title.create empresa') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.empresa.empresa.create') ?>" }
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
