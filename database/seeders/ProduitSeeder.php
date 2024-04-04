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
            'label' => 'Maillot',
            'image' => 'image_produit/maillot.jpg',
            'prix' => '59.99'
        ]);
        Produit::create([
            'label' => 'Ballon',
            'image' => 'image_produit/ballon.jpg',
            'prix' => '19.90'
        ]);
        Produit::create([
            'label' => 'Chaussure',
            'image' => 'image_produit/chaussure.jpg',
            'prix' => '150.50'
        ]);
        Produit::create([
            'label' => 'Filet',
            'image' => 'image_produit/filet.jpg',
            'prix' => '239.30'
        ]);
    }
}
