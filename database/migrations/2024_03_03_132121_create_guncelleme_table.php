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
        Schema::create('guncelleme', function (Blueprint $table) {
            $table->id();
            $table->text('android');
            $table->text('ios');
            $table->boolean('android_check')->default(1);
            $table->boolean('ios_check')->default(1);
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
        Schema::dropIfExists('guncelleme');
    }
};
