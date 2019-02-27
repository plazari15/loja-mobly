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
                <p><a href="{{ route('produtos.create') }}" class="btn btn-success">CRIAR CATEGORIA</a></p>
                <div class="box box-primary">
                    <table class="table">
                        <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th></th>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $cat)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $cat }}</td>

                                    <td>
                                        <a href="{{ route('categories.edit', $key) }}">EDITAR</a>
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