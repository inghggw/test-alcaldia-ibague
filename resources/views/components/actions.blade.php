<div class="flex justify-around rounded-lg p-2 mt-2 mb-2 dark:bg-slate-700 dark:text-slate-200">

    <x-primary-button type="submit">
        <i class="fas fa-floppy-disk mr-2"></i>
        Guardar
    </x-primary-button>

    <x-secondary-button wire:click="clean">
        <i class="fas fa-eraser mr-2"></i>
        Limpiar
    </x-secondary-button>

</div>

@if (session('success'))
    <div x-data="{ show: true }">
        <x-dialog-modal id="successModal">

            <x-slot name="title">
                <div class="sm:flex sm:items-center">
                    <div
                        class="shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-700 sm:mx-0 sm:h-10 sm:w-10 sm:me-2">
                        <i class="fa-solid fa-circle-check text-verde"></i>
                    </div>
                    <div>
                        Éxito
                    </div>

                </div>
            </x-slot>

            <x-slot name="content">
                {{ session('success') }}
            </x-slot>

            <x-slot name="footer">
                <button x-on:click="show = false"
                    class="bg-verde hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2"
                    type="button">Aceptar</button>
            </x-slot>

        </x-dialog-modal>
    </div>
@endif

@if ($errors->any())
    <div x-data="{ show: true }">
        <x-dialog-modal id="errorModal">

            <x-slot name="title">
                <div class="sm:flex sm:items-center">
                    <div
                        class="shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10 sm:me-2">
                        <i class="fa-solid fa-circle-exclamation text-red-600"></i>
                    </div>
                    <div>
                        Alerta
                    </div>

                </div>
            </x-slot>

            <x-slot name="content">
                {{ __('Por favor revise y corrija los errores marcados con rojo.') }}
            </x-slot>

            <x-slot name="footer">
                <button x-on:click="show = false"
                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2"
                    type="button">Aceptar</button>
            </x-slot>

        </x-dialog-modal>
    </div>
@endif
