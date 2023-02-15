@extends('layouts.main-layout')

@section('content')
    
    <h1>CREA NUOVO PRODOTTO</h1>
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
            <label for="name">Nome prodotto</label>
            <input type="text" name="name"><br>

            <label for="description">Descrizione</label>
            <input type="text" name="description"> <br>

            <label for="price">Prezzo</label>
            <input type="number" name="price"> <br>

            <label for="weight">Peso</label>
            <input type="number" name="weight"> <br>

            <label for="typology">Tipologia</label>
            <select name="typology_id">

                @foreach ($typologies as $typology)

                    <option value="{{ $typology -> id }}">{{ $typology -> name }}</option>  

                @endforeach

            </select> <br>

        <h3>Categorie</h3>
        
        @foreach ($categories as $category)

            <input type="checkbox" name="categories[]" value={{ $category -> id }}>
            <label for="categories">{{ $category -> name }}</label> <br>

        @endforeach

            <input type="submit" value="CREA NUOVO PRODOTTO">
    </form>

@endsection