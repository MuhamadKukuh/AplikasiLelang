<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_details', function (Blueprint $table) {
            $table->id('detail_id');
            $table->string('camera');
            $table->string('display');
            $table->string('chipset');
            $table->string('battery');
            $table->string('storage');
            $table->foreignId('brand_id');
            $table->enum('condition', ['used', 'new']);
            $table->foreignId('item_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_details');
    }
};
