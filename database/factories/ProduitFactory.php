<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => 'Pot de Peinture Noir',
            'image' => 'image_produit/pot_peinture_noir',
            'prix' => '10.99'
        ];
    }

    public function definition2(): array
    {
        return [
            'label' => 'Vitamine C',
            'image' => 'image_produit/vitamine_c',
            'prix' => '5.90'
        ];
    }

    public function definition3(): array
    {
        return [
            'label' => 'Lot de Livre',
            'image' => 'image_produit/lot_livre',
            'prix' => '12.50'
        ];
    }

    public function definition4(): array
    {
        return [
            'label' => 'Brosse à dent Electrique',
            'image' => 'image_produit/brosse_dent_electrique',
            'prix' => '4.30'
        ];
    }
}
