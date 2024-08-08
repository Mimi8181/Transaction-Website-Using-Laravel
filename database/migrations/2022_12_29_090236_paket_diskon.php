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
        Schema::create('paket_diskon', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('syarat_diskon')->required();
            $table->bigInteger('potongan_harga')->required();
            $table->bigInteger('harga_diskon')->required();
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
        Schema::dropIfExists('paket_diskon');
    }
};
