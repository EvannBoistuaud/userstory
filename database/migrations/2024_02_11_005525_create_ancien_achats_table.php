<?php

use App\Models\CoordonneeBancaire;
use App\Models\TypePaiement;
use App\Models\User;
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
        Schema::create('ancien_achats', function (Blueprint $table) {
            $table->id();


            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(TypePaiement::class)->constrained();
            $table->foreignIdFor(CoordonneeBancaire::class)->nullable()->constrained();
            $table->date('date_paiement');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ancien_achats');
    }
};
