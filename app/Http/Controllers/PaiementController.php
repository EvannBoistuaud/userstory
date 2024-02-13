<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\TypePaiement;
use Illuminate\Http\Request;
use App\Models\CoordonneeBancaire;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    public function info()
    {
        $user = Auth::user();
        $allPaiements = TypePaiement::all();
        $typePaiement = TypePaiement::where("id", $user->type_paiement_id)->first();
        $coordonneeBancaire = CoordonneeBancaire::where("id", $user->typePaiement_id)->get();

        return view("boutique.infoPaiement", compact("user", "typePaiement", "coordonneeBancaire", 'allPaiements'));
    }

    public function coordonnees(Request $request, CoordonneeBancaire $coordonneeBancaire)
    {
        $request->validate([
            'expiration_date' => 'required|regex:/^\d{2}\/\d{2}$/',
        ]);

        $expirationDate = '01/' . $request->input('expiration_date'); // Ajouter '01' pour obtenir une date complète
        $expirationDate = Carbon::createFromFormat('d/m/y', $expirationDate)->format('Y-m-d');
    }
}
