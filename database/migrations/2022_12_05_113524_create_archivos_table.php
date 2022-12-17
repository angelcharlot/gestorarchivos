<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('categoria_id');
            $table->string('url');
            $table->string('extencion');
            $table->string('p_delete')->nullable();
            $table->string('p_update')->nullable();
            $table->string('p_share')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
        Schema::create('archivo_user', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('archivo_id')->nullable();
            $table->foreign('archivo_id')->references('id')->on('archivos')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('archivos');
    }
}
