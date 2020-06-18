<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsFavories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits_favories', function (Blueprint $table) {
            $table->unsignedBigInteger('favorie_id');

            $table->foreign('favorie_id')->references('id')->on('favories');

            $table->unsignedBigInteger('produit_id');

            $table->foreign('produit_id')->references('id')->on('produits');

            //$table->integer('quantite')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits_favories');
    }
}
