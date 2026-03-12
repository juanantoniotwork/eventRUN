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
            $table->string('nombre_en')->nullable()->after('nombre');
            $table->text('descripcion_en')->nullable()->after('descripcion');
            $table->text('reglamento_en')->nullable()->after('reglamento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn(['nombre_en', 'descripcion_en', 'reglamento_en']);
        });
    }
};
