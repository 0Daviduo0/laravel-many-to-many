@extends('layouts.main-layout')

@section('content')
    
    <h1>Prodotti</h1>
    <a href="{{ route('product.create') }}">CREA NUOVO PRODOTTO</a>
    @foreach ($categories as $category)
        <h2>{{ $category -> name }}</h2>
        <ul>
            @foreach ($category -> products as $product)
                <li>

                    [{{ $product -> code }}] {{ $product -> name }} <br>
                    {{ $product -> typology -> name }} <br>
                    {{ $product -> typology -> digital ? "Digitale 📲" : "Fisico 📦" }} <br>
                    <a href="{{ route('product.edit', $product) }}">Modifica 📝 </a> | 
                    <a href="{{ route('product.delete', $product) }}"> Cancella ❌</a>

                </li> <br> <br>
            @endforeach
        </ul>
    @endforeach

@endsection