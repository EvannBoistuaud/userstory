<?php

use App\Models\Produit;
use App\Models\AncienAchat;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ancien_achats_produits', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(AncienAchat::class)->constrained();
            $table->foreignIdFor(Produit::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ancien_achats_produits');
    }
};
