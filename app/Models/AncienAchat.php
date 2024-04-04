<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AncienAchat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_paiement_id',
        'date_paiement',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function typePaiement(){
        return $this->belongsTo(TypePaiement::class);
    }
    public function produits(): BelongsToMany {
        return $this->belongsToMany(Produit::class);
    }
}
