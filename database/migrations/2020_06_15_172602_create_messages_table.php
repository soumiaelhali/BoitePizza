<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
           $table->id();
           $table->string('objet')->nullable();
           $table->text('message');
           $table->boolean('vu');
           $table->dateTime('datetime')->useCurrent();;

           $table->unsignedBigInteger('client_id')->nullable();
           $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('messages');
    }
}
