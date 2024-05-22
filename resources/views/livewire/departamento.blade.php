<x-form titulo="Departamentos">

    <div class="flex flex-col sm:flex-row">
        <div class="mb-4 sm:w-1/2 sm:pr-2">
            <x-input name="nombre" label="Nombre" required />
        </div>

        <div class="mb-4 sm:w-1/2 sm:pr-2">
            <x-input name="codigo" label="Código" required />
        </div>
    </div>

    <x-slot:table>
        <livewire:departamento-table />
    </x-slot:table>

</x-form>
