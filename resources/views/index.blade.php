@extends('Theme.app')
@section('content')
    <div id="app">
        <div class="col s12" style="margin-top: 5%">
            <form action="/search">
                <input type="text" name="query" placeholder="Insira o nome de um produto aqui e ap">
            </form>
        </div>
        <produtos-list></produtos-list>
    </div>
@endsection