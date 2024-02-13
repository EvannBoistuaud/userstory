<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produit::create([
            'label' => 'Pot de Peinture Noir',
            'image' => 'image_produit/pot_peinture_noir.jpg',
            'prix' => '10.99'
        ]);
        Produit::create([
            'label' => 'Vitamine C',
            'image' => 'image_produit/vitamin_c.jpg',
            'prix' => '5.90'
        ]);
        Produit::create([
            'label' => 'Lot de Livre',
            'image' => 'image_produit/lot_livre.jpg',
            'prix' => '12.50'
        ]);
        Produit::create([
            'label' => 'Brosse à dent Electrique',
            'image' => 'image_produit/brosse_dent_electrique.jpg',
            'prix' => '4.30'
        ]);
    }
}
