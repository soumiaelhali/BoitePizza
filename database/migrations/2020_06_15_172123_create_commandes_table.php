<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
           $table->id();
           $table->dateTime('date')->useCurrent();;
           $table->text('adressLiv');
           $table->string('type');
           $table->boolean('realise');
           $table->string('secteur');
           $table->integer('qty_total');
           $table->prixTotal('float');
           $table->timestamps();
           $table->unsignedBigInteger('client_id');
           $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
