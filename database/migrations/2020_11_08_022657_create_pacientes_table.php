<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorias_id');
            $table->integer('solicitacao');
            $table->integer('cns');
            $table->string('nomedousuario');
            $table->string('municipio');
            $table->string('datasolicitacao');
            $table->string('unidadedesejada');
            $table->string('codigo');
            $table->text('observacao1');
            $table->text('observacao2');
            $table->text('observacao3');
            $table->text('observacao4');
            $table->text('observacao5');
            $table->timestamps();
        });

        Schema::table('pacientes', function (Blueprint $table) {
            $table->foreign('categorias_id')->references('id')->on('categorias');
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');



    }
}
