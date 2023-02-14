@extends('layouts.main-layout')

@section('content')
    
    <h1>PRODOTTI</h1>
    <a href="{{ route('product.create') }}">CREA NUOVO PRODOTTO</a>
    <ul>
        @foreach ($products as $product)
            <li>

                [{{ $product -> code }}] {{ $product -> name }} <br>
                {{ $product -> typology -> name }} <br>
                {{ $product -> typology -> digital ? "📲" : "📦" }} <br> <br>

            </li>
        @endforeach
    </ul>

@endsection