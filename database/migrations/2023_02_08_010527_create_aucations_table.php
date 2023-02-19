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
        Schema::create('aucations', function (Blueprint $table) {
            $table->id('aucation_id');
            $table->string('final_price')->nullable();
            $table->date('aucation_date');
            $table->integer('multiple_bid');
            $table->string('initial_price');
            $table->foreignId('officer_id');
            $table->foreignId('item_id');
            $table->foreignId('user_id')->nullable();
            $table->enum("status", ["opened", "closed"]);   
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
        Schema::dropIfExists('aucations');
    }
};
