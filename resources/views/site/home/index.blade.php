@extends('site.templates.template1')

@section('content')

    <h1>Home PAGE do Site</h1>

    {{--    {!! $xss !!}--}}

    @if($var1 == '1234')

        <p>É igual</p>
    @else
        <p> É diferente</p>
    @endif

    @unless($var1 == 1234)

        <p>Não é igual....unless</p>

    @endunless

    @for($i=0;$i<=10;$i++)
        <p>VAlor@for : {{$i}}</p>
    @endfor
 {{--   @if(count($arrayData) >0)
        @foreach($arrayData as $array)
            <p>Valor@foreach : {{$array}}</p>
        @endforeach
    @else
        <p>Não existem itens para serem impressos</p>
    @endif
--}}

    @forelse($arrayData as $array)
        <p>Valor@forelse : {{$array}}</p>
    @empty
        <p>forelse : Não existem itens para seem impressos</p>
    @endforelse

    @php

    @endphp


@include('site.includes.sidebar', compact('var1'))

@endsection


@push('scripts')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endpush
