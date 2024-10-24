<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aumentos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->decimal('valor', 20, 2);
            $table->unsignedBigInteger('cargo_id');
            $table->unsignedBigInteger('empleado_id');
            $table->timestamps();

            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->foreign('empleado_id')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aumentos');
    }
}
