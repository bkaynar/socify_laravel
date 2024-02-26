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
        Schema::create('eczane', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->date('date');
            //silindi mi
            $table->boolean('silindi_mi')->default(0);

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
        Schema::dropIfExists('eczane');
    }
};
