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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->uuid('delivery_uuid')->unique();
            $table->integer('volumes');
            $table->uuid('carrier_uuid');
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('tracking_id');
            $table->unsignedBigInteger('recipient_id');
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('senders');
            $table->foreign('tracking_id')->references('id')->on('trackings');
            $table->foreign('recipient_id')->references('id')->on('recipients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('deliveries', function (Blueprint $table) {
        $table->dropForeign(['sender_id']);
        $table->dropForeign(['tracking_id']);
        $table->dropForeign(['recipient_id']);
    });

    Schema::dropIfExists('deliveries');
}
};
