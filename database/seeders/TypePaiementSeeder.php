<?php

namespace Database\Seeders;

use App\Models\TypePaiement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypePaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypePaiement::create(['nom_paiement' => 'Carte Bleu']);
        TypePaiement::create(['nom_paiement' => 'PayPal']);
        TypePaiement::create(['nom_paiement' => 'Paysafecard']);
        TypePaiement::create(['nom_paiement' => 'Liquide']);
    }
}
