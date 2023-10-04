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
        Schema::create('reg_regencies', function (Blueprint $table) {
            $table->char('id', 5)->primary();
            $table->char('province_id', 2);
            $table->string('name', 255);
            $table->timestamps();

            $table->foreign('province_id')
            ->references('id')
            ->on('reg_provinces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_regencies');
    }
};
