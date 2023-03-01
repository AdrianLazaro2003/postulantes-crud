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
        Schema::create('postulantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_documento_id');
            $table->string('numero_documento', 10)->unique();
            $table->string('nombre', 120);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 20);
            $table->string('email', 50)->nullable();
            $table->timestamps();

            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulantes');
    }
};
