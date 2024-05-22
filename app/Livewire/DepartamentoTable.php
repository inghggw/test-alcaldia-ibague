<?php

namespace App\Livewire;

use App\Models\Departamento;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DepartamentoTable extends DataTableComponent
{
	protected $model = Departamento::class;

	public function configure(): void
	{
		$this->setPrimaryKey('id');
	}

	public function columns(): array
	{
		return [
			Column::make("Id", "id")
				->sortable()->searchable(),
			Column::make("Nombre", "nombre")->sortable()->searchable(),
			Column::make("Código", "codigo")->sortable()->searchable(),

			Column::make("Creado ", "created_at")->sortable()->searchable(),
			Column::make("Última actualización", "updated_at")->sortable()->searchable(),
			Column::make("Acciones", 'id')->format(
				fn ($value) => view('components.actions-table')->with(['id' => $value])
			),
		];
	}
}
