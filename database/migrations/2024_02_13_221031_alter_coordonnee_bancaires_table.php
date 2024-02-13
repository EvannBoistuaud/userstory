<?php

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
        Schema::table('coordonnee_bancaires', function (Blueprint $table) {
            $table->dropColumn('numero_carte');
        });
        Schema::table('coordonnee_bancaires', function (Blueprint $table) {
            $table->string('numero_carte', 20);
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('coordonnee_bancaires', function (Blueprint $table) {
            $table->dropColumn('numero_carte');
        });
        Schema::table('coordonnee_bancaires', function (Blueprint $table) {
            $table->integer('numero_carte');
        });
        Schema::enableForeignKeyConstraints();
    }
};
