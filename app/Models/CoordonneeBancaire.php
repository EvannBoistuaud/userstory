<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CoordonneeBancaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom',
        'prenom',
        'numero_carte',
        'code_securite',
        'date_expiration',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
