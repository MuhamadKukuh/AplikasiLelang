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
        Schema::create('aucation_histories', function (Blueprint $table) {
            $table->id('history_id');
            $table->foreignId('user_id');
            $table->foreignId('aucation_id');
            $table->string('price_quotaion');   
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
        Schema::dropIfExists('aucation_histories');
    }
};
