<?php

namespace App\Livewire;

use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class EmpleadoForm extends Component
{
	public $id, $nombre, $apellido, $tipo_documento, $numero_documento, $departamento, $celular, $telefono, $direccion, $barrio;
	public $tipoDocumentos, $departamentos;

	/**
	 * Cargar los selects del form
	 *
	 * @return void
	 */
	public function mount() {
		$this->tipoDocumentos = TipoDocumento::all();
		$this->departamentos = Departamento::orderBy('nombre', 'asc')->get();
	}

	/**
	 * Renderizar la vista del componente
	 * @return void
	 */
	public function render()
	{
		return view('livewire.empleado');
	}

	/**
	 * Limpiar el formulario
	 *
	 * @return void
	 */
	public function clean()
	{
		$this->reset('id', 'nombre', 'apellido', 'tipo_documento', 'numero_documento', 'departamento', 'celular', 'telefono', 'direccion', 'barrio');
		$this->resetErrorBag();
	}

	/**
	 * Establecer las reglas de validación para el formulario
	 *
	 * @return void
	 */
	public function rules()
	{
		return [
			'nombre' => ['required', 'string', 'max:255'],
			'apellido' => ['required', 'string', 'max:255'],
			'tipo_documento' => ['required'],
			'numero_documento' => ['required', 'digits_between:1,11'],
			'departamento' => ['required'],
			'celular' => ['required', 'numeric', 'digits_between:1,10'],
			'telefono' => ['nullable', 'numeric', 'digits_between:1,10'],
			'direccion' => ['nullable', 'string', 'max:255'],
			'barrio' => ['nullable', 'string', 'max:255'],
		];
	}

	/**
	 * Crear o actualizar el empleado
	 *
	 * @return void
	 */
	public function save()
	{
		$this->validate();

		Empleado::updateOrCreate(
			['id' => $this->id],
			[
				'nombre' => $this->nombre,
				'apellido' => $this->apellido,
				'tipo_documento_id' => $this->tipo_documento,
				'numero_documento' => $this->numero_documento,
				'departamento_id' => $this->departamento,
				'celular' => $this->celular,
				'telefono' => $this->telefono,
				'direccion' => $this->direccion,
				'barrio' => $this->barrio,
			]
		);

		Session::flash('success', 'Se guardó el empleado correctamente');

		$this->dispatch('refreshDatatable');

		$this->clean();
	}

	/**
	 * Cargar un registro al formulario para actualizarlo
	 *
	 * @param int $id
	 * @return void
	 */
	public function edit($id)
	{
		$data = Empleado::findOrFail($id);

		$this->id = $id;
		$this->nombre = $data->nombre;
		$this->apellido = $data->apellido;
		$this->tipo_documento = $data->tipo_documento_id;
		$this->numero_documento = $data->numero_documento;
		$this->departamento = $data->departamento_id;
		$this->celular = $data->celular;
		$this->telefono = $data->telefono;
		$this->direccion = $data->direccion;
		$this->barrio = $data->barrio;


		$this->resetErrorBag();
	}

	/**
	 * Eliminar un registro
	 *
	 * @param int $id
	 * @return void
	 */
	public function delete($id)
	{
		Empleado::findOrFail($id)->delete();

		Session::flash('success', 'Se eliminó el empleado correctamente');

		$this->dispatch('refreshDatatable');
	}
}
