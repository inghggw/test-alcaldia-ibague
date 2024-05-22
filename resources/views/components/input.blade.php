@props([
    'disabled' => false,
    'name' => Str::random(10),
		'type' => 'text',
    'label' => null,
    'required' => false,
    'errorClass' => $errors->has($name) ? 'border-red-500 hover:border-red-700' : '',
])

@if ($label)
    <x-input-label for="{{ $name }}" required="{{ $required }}"> {{ $label }}</x-label>
@endif

<input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" wire:model="{{ $name }}"
    {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => "w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm $errorClass",
    ]) !!}>

<x-input-error class="mt-2" :messages="$errors->get($name)" />
