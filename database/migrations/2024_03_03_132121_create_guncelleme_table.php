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
            $table->text('android')->nullable();
            $table->text('ios')->nullable();
            $table->boolean('android_check')->default(1);
            $table->boolean('ios_check')->default(1);
            $table->text('playstore_link')->nullable();//nullable boş geçilebilir demek
            $table->text('appstore_link')->nullable();//nullable boş geçilebilir demek
            $table->boolean('silindi')->default(0);
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
