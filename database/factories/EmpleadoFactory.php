<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'nombre' => $this->faker->name(),
			'apellido' => $this->faker->lastName(),
			'tipo_documento_id' => $this->faker->numberBetween(1, 3),
			'numero_documento' => $this->faker->numberBetween(1, 9999999),
			'departamento_id' => $this->faker->numberBetween(1, 5),
			'celular' => $this->faker->numberBetween(1, 9999999),
			'telefono' => $this->faker->numberBetween(1, 9999999),
			'direccion' => $this->faker->address(),
			'barrio' => $this->faker->streetName(),
		];
	}
}
