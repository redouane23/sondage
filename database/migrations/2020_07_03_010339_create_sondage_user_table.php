<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSondageUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sondage_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sondage_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('oui')->default(0);
            $table->integer('non')->default(0);
            $table->integer('ignorer')->default(0);
            $table->timestamps();


            $table->foreign('sondage_id')->references('id')->on('sondages')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sondage_user');
    }
}
