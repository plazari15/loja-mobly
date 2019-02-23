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
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->SKU }}</td>
                                    <td>{{ number_format($product->normal_price, 2, '.', ',') }}</td>
                                    <td>{{ $product->qtd }}</td>
                                    <td>
                                        <a href="">DESATIVAR</a> ||
                                        <a href="{{ route('produtos.edit', $product->id) }}">EDITAR</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop