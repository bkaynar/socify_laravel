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
        Schema::create('etkinlikler', function (Blueprint $table) {
            $table->id();
            $table->string('topluluk_adi');
            $table->string('etkinlik_adi');
            $table->string('baslangic_tarihi');
            $table->string('bitis_tarihi');
            $table->boolean('silindi_mi')->default(false);
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
        Schema::dropIfExists('etkinlikler');
    }
};
