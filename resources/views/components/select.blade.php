@props([
    'disabled' => false,
    'name' => Str::random(10),
    'label' => null,
    'required' => false,
    'errorClass' => $errors->has($name) ? 'border-red-500 hover:border-red-700' : '',
])

@if ($label)
    <x-input-label for="{{ $name }}" required="{{ $required }}"> {{ $label }}</x-label>
@endif

<select id="{{ $name }}" name="{{ $name }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => "w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm $errorClass",
]) !!}
    wire:model.blur="{{ $name }}" wire:change="$refresh">
    <option value="">Selecciona una opción...</option>
    {{ $slot }}
</select>

<x-input-error class="mt-2" :messages="$errors->get($name)" />
