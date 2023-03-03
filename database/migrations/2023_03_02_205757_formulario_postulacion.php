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
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postulante_id');
            $table->unsignedBigInteger('documento_id');
            $table->unsignedBigInteger('remoto_id');
            $table->string('observaciones', 200);
            $table->unsignedBigInteger('estado_id');
            $table->timestamps();

            $table->foreign('postulante_id') -> references('id') -> on('postulantes') ->onDelete('cascade');
            $table->foreign('documento_id') -> references('id') -> on('tipo_documentos') ->onDelete('cascade');
            $table->foreign('remoto_id') -> references('id') -> on('tipo_servicios');
            $table->foreign('estado_id') -> references('id') -> on('tipo_estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formularios');
    }
};