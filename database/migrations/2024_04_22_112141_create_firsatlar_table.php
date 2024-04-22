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
        Schema::create('firsat', function (Blueprint $table) {
            $table->id();
            $table->string('adi');
            $table->string('aciklama');
            $table->string('foto')->nullable();
            $table->boolean('oncelik')->default(0);
            $table->string('link')->nullable();
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
        Schema::dropIfExists('firsat');
    }
};
