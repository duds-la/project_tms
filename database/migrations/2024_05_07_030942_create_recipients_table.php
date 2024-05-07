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
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->string('name',250);
            $table->string('cpf',15)->unique();
            $table->string('address',150);
            $table->string('state',40);
            $table->string('cep',40);
            $table->string('country',40);
            $table->string('geo_lat',40);
            $table->string('geo_lng',40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipients');
    }
};
