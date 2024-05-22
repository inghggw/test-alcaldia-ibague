@props(['id'])

<div x-data="{ show: false }">

    <button title="Editar" wire:click="$parent.edit({{ $id }})"
        @click.prevent="$refs.contentarea.scrollTo({
            top: 0,
            behavior: 'smooth'
        })"
        type="button"
        class="p-2 bg-indigo-400 dark:bg-indigo-800 rounded-lg hover:rounded-3xl hover:bg-indigo-600 transition-all duration-300 text-white">
				<i class="fas fa-pen-to-square h-4 w-4"></i> Editar
    </button>


    <button title="Eliminar" x-on:click="show = true"
        class="p-2 ml-4 bg-red-500 dark:bg-red-800 rounded-lg hover:rounded-3xl hover:bg-red-600 transition-all duration-300 text-white">
				<i class="fas fa-trash h-4 w-4"></i> Eliminar
    </button>


    <x-confirmation-modal id="confirmDeleteModal{{ $id }}">
        <x-slot name="title">
            Confirmación de eliminación
        </x-slot>

        <x-slot name="content">
            ¿Estás seguro de que deseas eliminar este registro?
        </x-slot>

        <x-slot name="footer">
            <button wire:click="$parent.delete({{ $id }})"
                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2">Eliminar</button>
            <button x-on:click="show = false"
                class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">Cancelar</button>
        </x-slot>
    </x-confirmation-modal>
</div>
