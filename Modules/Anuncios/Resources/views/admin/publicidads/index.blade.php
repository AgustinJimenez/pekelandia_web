@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('anuncios::publicidads.title.publicidads') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('anuncios::publicidads.title.publicidads') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <!--<div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{-- route('admin.anuncios.publicidad.create') --}}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{-- trans('Crear publicidad') --}}
                    </a>
                </div>
            </div>-->
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
                            <th>{{ trans('Orden') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($publicidads)): ?>
                        <?php foreach ($publicidads as $publicidad): ?>
                        <tr>
                            <td>
                                <a href="{{ route('admin.anuncios.publicidad.edit', [$publicidad->id]) }}">
                                    {{ $publicidad->id }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.anuncios.publicidad.edit', [$publicidad->id]) }}">
                                    {{ $publicidad->titulo }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.anuncios.publicidad.edit', [$publicidad->id]) }}">
                                    {{ $publicidad->orden }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.anuncios.publicidad.edit', [$publicidad->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <!--<button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{-- route('admin.anuncios.publicidad.destroy', [$publicidad->id]) --}}"><i class="fa fa-trash"></i></button>-->
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
                            <th>{{ trans('Orden') }}</th>
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
        <dd>{{ trans('anuncios::publicidads.title.create publicidad') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.anuncios.publicidad.create') ?>" }
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
