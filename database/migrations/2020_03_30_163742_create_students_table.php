<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('titulo', 255);
            $table->string('asesor', 100);
            $table->string('autor', 100);
            $table->string('autor2', 100);
            $table->unsignedBigInteger('carrera_id');
            $table->unsignedBigInteger('residencia_id');
            $table->string('archivo', 100);
            $table->foreign('carrera_id')
                    ->references('id')
                    ->on('carreras')
                    ->onDelete('cascade');
            $table->foreign('residencia_id')
                    ->references('id')
                    ->on('residencias')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
