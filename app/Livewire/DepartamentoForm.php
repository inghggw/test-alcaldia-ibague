<?php

namespace App\Livewire;

use App\Models\Departamento;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DepartamentoForm extends Component
{
    public $id, $nombre, $codigo;

    /**
     * Renderizar la vista del componente
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.departamento');
    }

    /**
     * Limpiar el formulario
     *
     * @return void
     */
    public function clean()
    {
        $this->reset('id', 'nombre', 'codigo');
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
            'codigo' => ['required', 'numeric', 'digits_between:1,3'],
        ];
    }

    /**
     * Crear o actualizar el departamento
     *
     * @return void
     */
    public function save()
    {
        $this->validate();

        Departamento::updateOrCreate(
            ['id' => $this->id],
            [
                'nombre' => $this->nombre,
                'codigo' => $this->codigo,
            ]
        );

        Session::flash('success', 'Se guardó el departamento correctamente');

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
        $data = Departamento::findOrFail($id);

        $this->id = $id;
        $this->nombre = $data->nombre;
        $this->codigo = $data->codigo;

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
        $departamento = Departamento::findOrFail($id);

        // Verificar si el departamento tiene empleados
        if ($departamento->empleados()->count() > 0) {
            Session::flash('error', 'No se puede eliminar el departamento porque tiene empleados asociados');
            return;
        }

        $departamento->delete();

        Session::flash('success', 'Se eliminó el departamento correctamente');

        $this->dispatch('refreshDatatable');
    }
}
