<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Typology;
use App\Models\Product;

class MainController extends Controller
{
    
    //------pagina principale------
    public function home() {
        $categories = Category :: all();
    return view('pages.home', compact('categories'));
    }

    //------Pagina dei prodotti------
    public function products() {
        $products = Product :: all();
    return view('pages.product.home', compact('products'));
    }

    //------Funzione per creare nuovi prodotti------
    public function productCreate() {
        $typologies = Typology :: all();
        $categories = Category :: all();
    return view('pages.product.create', compact('categories', 'typologies'));
    }
    //Funzione per salvare i prodotti all'interno del DB
    public function productStore(Request $request) {

        // dd($request -> all());

        $data = $request -> validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array'
        ]);

        $code = rand(10000, 99999);
        $data['code'] = $code;
        $product = Product :: make($data);
        $typology = Typology :: find($data['typology_id']);
        $product -> typology() -> associate($typology);
        $product -> save();
        $categories = Category :: find($data['categories']);
        $product -> categories() -> attach($categories);

        return redirect() -> route('home');
    }

    //------Funzione per modificare i prodotti------
    public function productEdit(Product $product) {

            $typologies = Typology :: all();
            $categories = Category :: all();

        return view('pages.product.edit', compact(
                        'product',
                        'typologies',
                        'categories'
                    ));
    }
    //Funzione per aggiornare i prodotti modificati
    public function productUpdate(Request $request, Product $product) {

        $data = $request -> validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array'
        ]);

            $product -> update($data);
            $typology = Typology :: find($data['typology_id']);

            $product -> typology() -> associate($typology);
            $product -> save();
            
            $categories = Category :: find($data['categories']);
            $product -> categories() -> sync($categories);

        return redirect() -> route('home');
    }

    //------Funzione per eliminare i prodotti dal DB------
    public function productDelete(Product $product) {

            $product -> categories() -> sync([]);
            $product -> delete();

        return redirect() -> route('home');
    }
}

