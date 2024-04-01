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
        Schema::create('sikayetler', function (Blueprint $table) {
            $table->id();
            $table->string('isimSoyisim');
            $table->text('sikayetSahibiTel')->nullable();
            $table->text('sikayetSahibiMail')->nullable();
            $table->text('sikayetMetni');
            $table->string('androidVersion')->nullable();
            $table->string('androidBrand')->nullable();
            $table->string('androidDevice')->nullable();
            $table->string('androidFingerprint')->nullable();
            $table->string('androidID')->nullable();
            $table->string('androidManufacturer')->nullable();
            $table->string('androidModel')->nullable();
            $table->string('androidSerialNumber')->nullable();
            $table->string('ipAdresi')->nullable();
            $table->boolean('cevap')->default(false);
            $table->text('cevapmetni')->nullable();
            $table->timestamp('cevaplanmatarihi')->nullable();
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
        Schema::dropIfExists('sikayetler');
    }
};
