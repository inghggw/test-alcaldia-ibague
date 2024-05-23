<?php

namespace App\Livewire;

use App\Models\Empleado;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class EmpleadoTable extends DataTableComponent
{
	protected $model = Empleado::class;

	public function configure(): void
	{
		$this->setPrimaryKey('id');
	}

	public function columns(): array
	{
		return [
			Column::make("Id", "id")
				->sortable()->searchable(),
			Column::make("Nombre(s)", "nombre")->sortable()->searchable(),
			Column::make("Apellido(s)", "apellido")->sortable()->searchable(),
			Column::make("Tipo de Documento", "tipoDocumento.descripcion")->sortable()->searchable()->deselected(),
			Column::make("Número de Documento", "numero_documento")->sortable()->searchable(),
			Column::make("Departamento", "departamento.nombre")->sortable()->searchable(),

			Column::make("Creado ", "created_at")->sortable()->searchable()->deselected(),
			Column::make("Última actualización", "updated_at")->sortable()->searchable()->deselected(),
			Column::make("Acciones", 'id')->format(
				fn ($value) => view('components.actions-table')->with(['id' => $value])
			),
		];
	}
}
