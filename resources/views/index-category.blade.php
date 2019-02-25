@extends('Theme.app')
@section('content')
    <div id="app">
        <produtos-list category="{{ $categoriesSelected->id }}"></produtos-list>
    </div>
@endsection