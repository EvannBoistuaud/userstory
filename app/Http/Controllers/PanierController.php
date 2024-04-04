<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Produit;
use App\Models\AncienAchat;
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

    public function payer()
    {
        $user = Auth::user();

        if ($user->type_paiements_id !== null) {
        $dateNow = Carbon::now();
        $facture = AncienAchat::create(['user_id' => $user->id, 'type_paiement_id' => $user->type_paiement_id, 'date_paiement' => $dateNow]);



        foreach ($user->produits as $produit) {

        $facture->produits()->attach($produit);
        $user->produits()->detach($produit);
        }
        return redirect()->route('panier.index');
        }
        return redirect()->route('paiement.info');
    }
}
