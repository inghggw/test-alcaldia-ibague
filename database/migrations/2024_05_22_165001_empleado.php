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
		Schema::create('empleado', function (Blueprint $table) {
			$table->id();
			$table->string('nombre');
			$table->string('apellido');
			$table->foreignId('tipo_documento_id')->constrained('tipo_documento');
			$table->bigInteger('numero_documento');
			$table->foreignId('departamento_id')->constrained('departamento');
			$table->bigInteger('celular');
			$table->unsignedBigInteger('telefono')->nullable();
			$table->string('direccion')->nullable();
			$table->string('barrio')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('empleado');
	}
};
