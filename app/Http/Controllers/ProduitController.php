<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function show(Produit $produit)
    {
        return view('boutique.produit', compact('produit'));
    }
}
