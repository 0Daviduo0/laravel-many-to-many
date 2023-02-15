@extends('layouts.main-layout')

@section('content')
    
    <h1>Home Prodotti</h1>
    <h5>Per creare, modificare e eliminare prodotti <a href="{{ route('product.home') }}">Clicca qui</a></h5>
    @foreach ($categories as $category)
        <h2>{{ $category -> name }}</h2>
        <ul>
            @foreach ($category -> products as $product)
                <li>

                    [{{ $product -> code }}] {{ $product -> name }} <br>
                    {{ $product -> typology -> name }} <br>
                    {{ $product -> typology -> digital ? "Digitale 📲" : "Fisico 📦" }}

                </li> <br> <br>
            @endforeach
        </ul>
    @endforeach

@endsection