<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('crn');
            $table->string('name'); // Agregamos el campo para el nombre de la asignatura
            $table->integer('credits');
            $table->unsignedBigInteger('teacher_id'); // Definimos la clave foránea
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade'); // Referenciamos la clave foránea a la tabla de profesores y configuramos la eliminación en cascada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
