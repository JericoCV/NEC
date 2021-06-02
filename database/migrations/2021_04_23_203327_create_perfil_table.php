<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->id();
            $table->string('profession');
            $table->string('name');
            $table->string('lastname');
            $table->integer('userid');
            $table->integer('servicegroup');
            $table->string('ruc')->nullable();
            $table->string('workplace');
            $table->text('info')->nullable();
            $table->string('price')->nullable();
            $table->text('schedule')->nullable();
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
        Schema::dropIfExists('perfil');
    }
}
