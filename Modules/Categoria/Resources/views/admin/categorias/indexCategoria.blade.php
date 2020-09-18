@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Categorías') }}
    </h1>
@stop

@section('styles')
<style type="text/css">
    .item-group {
        font-size: 22px;
    }
</style>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="list-group text-center">
                        <li class="list-group-item"><a class="item-group" href="{{route('admin.categoria.categoria.index')}}">Categorías</a></li>
                        <li class="list-group-item"><a class="item-group" href="{{route('admin.categoria.subcategoria.index')}}">Subcategorías</a></li>
                        <li class="list-group-item"><a class="item-group" href="{{route('admin.categoria.subsubcategoria.index')}}">Subsubcategorías</a></li>
                      </ul>
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


@section('scripts')

@stop
