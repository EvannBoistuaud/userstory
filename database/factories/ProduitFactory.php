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
            'label' => 'Maillot',
            'image' => 'image_produit/maillot.jpg',
            'prix' => '59.99'
        ];
    }

    public function definition2(): array
    {
        return [
            'label' => 'Ballon',
            'image' => 'image_produit/ballon.jpg',
            'prix' => '19.90'
        ];
    }

    public function definition3(): array
    {
        return [
            'label' => 'Chaussure',
            'image' => 'image_produit/chaussure.jpg',
            'prix' => '150.50'
        ];
    }

    public function definition4(): array
    {
        return [
            'label' => 'Filet',
            'image' => 'image_produit/filet.jpg',
            'prix' => '239.30'
        ];
    }
}
