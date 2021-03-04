@props(['type' => 'text', 'name'])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    {{ $attributes->merge(['class' => "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"]) }}
>
