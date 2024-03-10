<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yurt_yemek', function (Blueprint $table) {
            $table->id();
            $table->string('corba');
            $table->string('ikinci');
            $table->string('ikincialternatif');
            $table->string('ucuncu');
            $table->string('dorduncu');
            $table->string('digeryiyecekler')->nullable();
            $table->date('tarih');
            $table->boolean('sabah_aksam');//0 sabah 1 aksam
            $table->boolean('silindi_mi')->default('0');
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
        Schema::dropIfExists('yurt_yemek');
    }
};
