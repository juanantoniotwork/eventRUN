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
        Schema::table('eventos', function (Blueprint $table) {
            $table->string('codigo', 12)->nullable()->unique()->after('id');
        });

        // Asignar código a eventos existentes
        foreach (\DB::table('eventos')->whereNull('codigo')->get() as $evento) {
            do {
                $codigo = 'EVT-' . strtoupper(\Str::random(6));
            } while (\DB::table('eventos')->where('codigo', $codigo)->exists());

            \DB::table('eventos')->where('id', $evento->id)->update(['codigo' => $codigo]);
        }
    }

    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropUnique(['codigo']);
            $table->dropColumn('codigo');
        });
    }
};
