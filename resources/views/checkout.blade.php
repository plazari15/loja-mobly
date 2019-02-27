@extends('Theme.app')
@section('content')
    <div id="app">
        {{--<div class="row">--}}
            {{--<div class="col s6" style="margin-top: 12%">--}}
                {{--<h1>Já Sou cliente</h1>--}}

                {{--{!! form($formLogin) !!}--}}

            {{--</div>--}}

            {{--<div class="col s6" style="margin-top: 12%">--}}
                {{--<h1>Ainda não sou cliente</h1>--}}
                {{--{!! form($formRegistro) !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <checkout></checkout>
        </div>

    </div>
@endsection