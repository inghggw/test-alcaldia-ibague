<?php

namespace Tests\Unit;

use App\Livewire\EmpleadoForm;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\TipoDocumento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class EmpleadoFormTest extends TestCase
{
	use RefreshDatabase;

	public function test_can_render_empleado_form()
	{
		Livewire::test(EmpleadoForm::class)
			->assertStatus(200);
	}

	public function test_can_create_empleado()
	{
		$tipoDocumento = TipoDocumento::factory()->create();
		$departamento = Departamento::factory()->create();

		Livewire::test(EmpleadoForm::class)
			->set('nombre', 'Juan')
			->set('apellido', 'Perez')
			->set('tipo_documento', $tipoDocumento->id)
			->set('numero_documento', '123456789')
			->set('departamento', $departamento->id)
			->set('celular', '987654321')
			->call('save')
			->assertHasNoErrors();

		$this->assertTrue(Empleado::where('nombre', 'Juan')->exists());
	}

	public function test_validation_rules()
	{
		Livewire::test(EmpleadoForm::class)
			->set('nombre', '')
			->set('apellido', '')
			->set('tipo_documento', '')
			->set('numero_documento', '')
			->set('departamento', '')
			->set('celular', '')
			->call('save')
			->assertHasErrors([
				'nombre' => 'required',
				'apellido' => 'required',
				'tipo_documento' => 'required',
				'numero_documento' => 'required',
				'departamento' => 'required',
				'celular' => 'required'
			]);

		Livewire::test(EmpleadoForm::class)
			->set('nombre', str_repeat('a', 256))
			->set('apellido', str_repeat('a', 256))
			->set('numero_documento', 'abc')
			->set('celular', '12345678901')
			->call('save')
			->assertHasErrors([
				'nombre' => 'max',
				'apellido' => 'max',
				'numero_documento' => 'digits_between',
				'celular' => 'numeric',
				'celular' => 'digits_between'
			]);
	}

	public function test_can_edit_empleado()
	{
		$tipoDocumento = TipoDocumento::factory()->create();
		$departamento = Departamento::factory()->create();
		$empleado = Empleado::factory()->create([
			'nombre' => 'Carlos',
			'apellido' => 'Lopez',
			'tipo_documento_id' => $tipoDocumento->id,
			'numero_documento' => '987654321',
			'departamento_id' => $departamento->id,
			'celular' => '123456789'
		]);

		Livewire::test(EmpleadoForm::class)
			->call('edit', $empleado->id)
			->assertSet('nombre', 'Carlos')
			->assertSet('apellido', 'Lopez')
			->assertSet('tipo_documento', $empleado->tipo_documento_id)
			->assertSet('numero_documento', '987654321')
			->assertSet('departamento', $empleado->departamento_id)
			->assertSet('celular', '123456789');
	}

	public function test_can_delete_empleado()
	{
		$tipoDocumento = TipoDocumento::factory()->create();
		$departamento = Departamento::factory()->create();
		$empleado = Empleado::factory()->create([
			'tipo_documento_id' => $tipoDocumento->id,
			'departamento_id' => $departamento->id,
		]);

		Livewire::test(EmpleadoForm::class)
			->call('delete', $empleado->id);

		$this->assertFalse(Empleado::where('id', $empleado->id)->exists());
	}
}
