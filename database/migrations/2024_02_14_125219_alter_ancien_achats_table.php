<?php

use App\Models\CoordonneeBancaire;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('ancien_achats', function (Blueprint $table) {
            $table->dropForeign(['coordonnee_bancaire_id']);
            $table->dropColumn('coordonnee_bancaire_id');
        });

        Schema::table('ancien_achats', function (Blueprint $table) {
            $table->date('date_facture')->nullable();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ancien_achats', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->foreignIdFor(CoordonneeBancaire::class)->constrained();
            Schema::enableForeignKeyConstraints();
            $table->dropColumn('date_facture');
        });
    }
};
