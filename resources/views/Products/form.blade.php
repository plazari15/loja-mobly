@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content')
    @include('errors')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {!! form($form) !!}
            </div>
        </div>
    </div>
@stop