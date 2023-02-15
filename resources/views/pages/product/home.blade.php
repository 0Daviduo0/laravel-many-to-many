@extends('layouts.main-layout')

@section('content')
    
    <h1>Lista prodotti</h1>
    <h5>Per tornare alla Home prodotti <a href="{{ route('home') }}">Clicca qui</a></h5>
    <a href="{{ route('product.create') }}">CREA NUOVO PRODOTTO</a>
    <ul>
        @foreach ($products as $product)
            <li>

                [{{ $product -> code }}] {{ $product -> name }} <br>
                {{ $product -> typology -> name }} <br>
                {{ $product -> typology -> digital ? "Fisico 📲" : "Digitale 📦" }} <br>
                <a href="{{ route('product.edit', $product) }}">Modifica 📝 </a> | 
                <a href="{{ route('product.delete', $product) }}"> Cancella ❌</a>

            </li> <br> <br>
        @endforeach
    </ul>

@endsection