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
        Schema::create('taksi', function (Blueprint $table) {
            $table->id();
            $table->string('adi', 10);
            $table->string('plaka', 10);
            $table->string('telefon');
            $table->boolean('aktif')->default(1);
            $table->boolean('silindi')->default(0);
            $table->boolean('oncelik')->default(0);
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
        Schema::dropIfExists('taksi');
    }
};
