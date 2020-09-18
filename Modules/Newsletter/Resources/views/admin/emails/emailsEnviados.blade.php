@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Newsletter - E-mails enviados') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('newsletter::emails.title.emails') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('ID') }}</th>
                            <th>{{ trans('Asunto') }}</th>
                            <th>{{ trans('Grupo') }}</th>
                            <th>{{ trans('Fecha') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($enviados)): ?>
                        <?php foreach ($enviados as $enviado): ?>
                        <tr>
                            <td>
                                <a href="{{ route('admin.newsletter.emails.detalleEmail', [$enviado->id]) }}">
                                    {{ $enviado->id }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.newsletter.emails.detalleEmail', [$enviado->id]) }}">
                                    {{ $enviado->asunto }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.newsletter.emails.detalleEmail', [$enviado->id]) }}">
                                    @if (isset($enviado->grupo->nombre))
                                    {{ $enviado->grupo->nombre }}
                                    @else
                                        {{ $enviado->email }}
                                    @endif
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.newsletter.emails.detalleEmail', [$enviado->id]) }}">
                                    {{ $enviado->created_at->format('d-m-Y') }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.newsletter.emails.detalleEmail', [$enviado->id]) }}" class="btn btn-default btn-flat">Detalle</a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.newsletter.emails.emailsEnviados.destroy', [$enviado->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('Asunto') }}</th>
                            <th>{{ trans('Asunto') }}</th>
                            <th>{{ trans('Grupo') }}</th>
                            <th>{{ trans('Fecha') }}</th>
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
        <dd>{{ trans('newsletter::emails.title.create emails') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.newsletter.emails.create') ?>" }
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
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@stop
