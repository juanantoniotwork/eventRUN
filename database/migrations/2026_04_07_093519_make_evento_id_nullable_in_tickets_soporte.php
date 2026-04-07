<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tickets_soporte', function (Blueprint $table) {
            $table->dropForeign(['evento_id']);
            $table->unsignedBigInteger('evento_id')->nullable()->change();
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('tickets_soporte', function (Blueprint $table) {
            $table->dropForeign(['evento_id']);
            $table->unsignedBigInteger('evento_id')->nullable(false)->change();
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
        });
    }
};
