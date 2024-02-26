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
        Schema::create('ekip', function (Blueprint $table) {
            $table->id();
            $table->string('adsoyad');
            $table->string('unvan');
            $table->string('aciklama');
            $table->string('resim')->nullable();
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
        Schema::dropIfExists('ekip');
    }
};
