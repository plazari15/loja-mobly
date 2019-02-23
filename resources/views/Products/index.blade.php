@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content')
    @include('errors')
    <div class="content">
        <div class="col-md-12">
            <div class="row">
                <div class="box box-primary">
                    <table class="table">
                        <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>SKU</th>
                        <th>Preço</th>
                        <th>Quantidades</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>SKU</td>
                        <td>Preço</td>
                        <th>Quantidades</th>
                        <th></th>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop