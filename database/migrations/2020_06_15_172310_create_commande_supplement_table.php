<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeSupplementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_supplement', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('commande_id')->nullable();
           $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');

           $table->unsignedBigInteger('supplement_id')->nullable();
           $table->foreign('supplement_id')->references('id')->on('supplements')->onDelete('cascade');

           $table->unique(['commande_id','supplement_id']);
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
        Schema::dropIfExists('commande_supplement');
    }
}
