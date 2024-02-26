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
        Schema::create('yemekler', function (Blueprint $table) {
            $table->id();
            $table->string('yemek1');
            $table->string('yemek2');
            $table->string('yemek3');
            $table->string('yemek4');
            //tarih
            $table->string('tarih');
            //silindi
            $table->boolean('silindi')->default(false);
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
        Schema::dropIfExists('yemekler');
    }
};
