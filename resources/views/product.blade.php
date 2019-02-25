@extends('Theme.app')
@section('content')
    <div id="app">
        <produto-show produtoid="{{ $id }}"></produto-show>
    </div>
@endsection