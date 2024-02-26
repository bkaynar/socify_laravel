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
        Schema::create('okuletkinlik', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->date('baslangic_tarihi');
            $table->time('saati');
            $table->text('link');
            $table->text('resim');
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
        Schema::dropIfExists('okuletkinlik');
    }
};
