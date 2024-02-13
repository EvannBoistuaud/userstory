<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoordonneeBancaireRequest;
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
        $coordonneeBancaire = CoordonneeBancaire::where("user_id", $user->id)->first();
        if ($coordonneeBancaire) {
            $coordonneeBancaire->date_expiration = date('m/y', strtotime($coordonneeBancaire->date_expiration));
        }
        return view("boutique.infoPaiement", compact("user", "typePaiement", "coordonneeBancaire", 'allPaiements'));
    }

    public function coordonnees(Request $request)
    {
        $user = Auth::user();
        $expirationDate = '01/' . $request->input('date_expiration'); // Ajouter '01' pour obtenir une date complète
        $expirationDate = Carbon::createFromFormat('d/m/y', $expirationDate)->format('Y-m-d');
        $request->merge(['date_expiration' => $expirationDate]);
        $data = $request->all();
        $existsCoordonnes = CoordonneeBancaire::where('user_id', $user->id)->exists();



        if ($existsCoordonnes) {
            $coordonnees = CoordonneeBancaire::where('user_id', $user->id)->first();
            $coordonnees->update($data);
        } else {

            $data['user_id'] = $user->id;
            CoordonneeBancaire::create($data);
        }

        return redirect()->back()->with('success', '');
    }
    public function typePaiement(Request $request)
    {

        $user = Auth::user();
        $data = $request->all();
        $typePaiementData = json_decode($data['typePaiement'], true);

        $typePaiementId = $typePaiementData['id'];
        $user->update(['type_paiement_id' => $typePaiementId]);

        return redirect()->back()->with('success', '');
    }
}
