@props(['titulo'])

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $titulo }}</h2>

            <form wire:submit.prevent="save" class="rounded-md border-0.5 p-3 mt-2 mb-3">

                {{ $slot }}

                <x-actions />

            </form>

            @isset($table)
                <div class="rounded border p-3">
                    <h3 class="font-semibold text-center text-lg text-gray-800 dark:text-gray-200 leading-tight">
                        Listado de {{ $titulo }}
                    </h3>
                    {{ $table }}
                </div>
            @endisset
        </div>
    </div>
</div>
