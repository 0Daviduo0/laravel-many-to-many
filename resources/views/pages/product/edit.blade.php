@extends('layouts.main-layout')

@section('content')
    
    <h1>Modifica il prodotto: {{ $product -> code }}</h1>

    <form action="{{ route('product.update', $product) }}" method="POST">
        @csrf
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{ $product -> name }}"><br>

            <label for="description">Descrizione</label>
            <input type="text" name="description" value="{{ $product -> description }}"><br>

            <label for="price">Prezzo</label>
            <input type="number" name="price" value="{{ $product -> price }}"> <br>

            <label for="weight">Peso</label>
            <input type="number" name="weight" value="{{ $product -> weight }}"> <br>

            <label for="typology">Tipologia</label>
            <select name="typology_id">
                
                <!-- Seleziona la tipologia dell'oggetto -->
                @foreach ($typologies as $typology)
                    <option 
                        value="{{ $typology -> id }}" 
                            @if ($product -> typology -> id == $typology -> id)selected @endif>
                        {{ $typology -> name }}

                    </option>    
                @endforeach

        </select> <br>

        <h3>Categorie</h3>

        <!-- Seleziona le categorie/la categoria dell'oggetto -->
        @foreach ($categories as $category)

            <input type="checkbox" name="categories[]" value="{{ $category -> id }}"

                @foreach ($product -> categories as $productCategory)
                    @if ($productCategory -> id == $category -> id)checked @endif
                @endforeach
            >
            <label for="categories">{{ $category -> name }}</label> <br>            
        @endforeach

        <input type="submit" value="Aggiorna prodotto">
    </form>

@endsection