<?php

namespace Tests\Unit;

use App\Livewire\DepartamentoForm;
use App\Models\Departamento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DepartamentoFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_render_departamento_form()
    {
        Livewire::test(DepartamentoForm::class)
            ->assertStatus(200);
    }

    public function test_can_create_departamento()
    {
        Livewire::test(DepartamentoForm::class)
            ->set('nombre', 'Nuevo Departamento')
            ->set('codigo', '123')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertTrue(Departamento::where('nombre', 'Nuevo Departamento')->exists());
    }

    public function test_validation_rules()
    {
        Livewire::test(DepartamentoForm::class)
            ->set('nombre', '')
            ->set('codigo', '')
            ->call('save')
            ->assertHasErrors(['nombre' => 'required', 'codigo' => 'required']);

        Livewire::test(DepartamentoForm::class)
            ->set('nombre', str_repeat('a', 256))
            ->set('codigo', 'abc')
            ->call('save')
            ->assertHasErrors(['nombre' => 'max', 'codigo' => 'numeric']);

        Livewire::test(DepartamentoForm::class)
            ->set('nombre', 'Nombre Válido')
            ->set('codigo', '12345')
            ->call('save')
            ->assertHasErrors(['codigo' => 'digits_between']);
    }

    public function test_can_edit_departamento()
    {
        $departamento = Departamento::factory()->create([
            'nombre' => 'Departamento Original',
            'codigo' => '100',
        ]);

        Livewire::test(DepartamentoForm::class)
            ->call('edit', $departamento->id)
            ->assertSet('nombre', 'Departamento Original')
            ->assertSet('codigo', '100');
    }

    public function test_can_delete_departamento_without_empleados()
    {
        $departamento = Departamento::factory()->create();

        Livewire::test(DepartamentoForm::class)
            ->call('delete', $departamento->id);

        $this->assertFalse(Departamento::where('id', $departamento->id)->exists());
    }
}
