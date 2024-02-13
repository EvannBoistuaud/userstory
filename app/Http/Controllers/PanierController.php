<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Auth;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view("boutique.panier", compact("user"));
    }
    public function add(Produit $produit)
    {
        $user = Auth::user();

        $user->produits()->attach($produit);

        return redirect()->route('index');
    }

    public function delete(Produit $produit)
    {
        $user = Auth::user();

        $user->produits()->detach($produit);

        return redirect()->route('panier.index');
    }

    public function empty()
    {
        $user = Auth::user();

        $user->produits()->detach();

        return redirect()->route('panier.index');
    }
}
