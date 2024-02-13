<?php

use App\Models\User;
use App\Models\Produit;
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
        Schema::create('produit_user', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Produit::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_user');
    }
};
