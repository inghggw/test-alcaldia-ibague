<x-form titulo="Empleados">

    <div class="flex flex-wrap">
        <div class="mb-4 w-full sm:w-1/2 sm:pr-2">
            <x-input name="nombre" label="Nombre(s)" required />
        </div>

        <div class="mb-4 w-full sm:w-1/2 sm:pl-2">
            <x-input name="apellido" label="Apellido(s)" required />
        </div>

        <div class="mb-4 w-full sm:w-1/4 sm:pr-2">
            <x-select name="tipo_documento" label="Tipo de Documento" required>
                @foreach ($tipoDocumentos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->descripcion }} ({{ $tipo->sigla }})</option>
                @endforeach
            </x-select>
        </div>

        <div class="mb-4 w-full sm:w-1/4 sm:pl-2">
            <x-input name="numero_documento" label="Número de Documento" required />
        </div>

        <div class="mb-4 w-full sm:w-1/4 sm:pl-2">
            <x-input name="celular" label="Celular" type="number" required />
        </div>

        <div class="mb-4 w-full sm:w-1/4 sm:pl-2">
            <x-input name="telefono" label="Teléfono" type="number" />
        </div>

        <div class="mb-4 w-full sm:w-1/3 sm:pr-2">
            <x-select name="departamento" label="Departamento" required>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                @endforeach
            </x-select>
        </div>

        <div class="mb-4 w-full sm:w-1/3 sm:px-2">
            <x-input name="direccion" label="Dirección" />
        </div>

        <div class="mb-4 w-full sm:w-1/3 sm:pl-2">
            <x-input name="barrio" label="Barrio" />
        </div>
    </div>

    <x-slot:table>
        <livewire:empleado-table />
    </x-slot:table>

</x-form>
