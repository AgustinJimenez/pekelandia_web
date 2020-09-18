@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Países') }}
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
                        <li class="list-group-item"><a class="item-group" href="{{route('admin.paises.pais.index')}}">Países</a></li>
                        <li class="list-group-item"><a class="item-group" href="{{route('admin.paises.ciudad.index')}}">Ciudades</a></li>
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
