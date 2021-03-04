@props(['readonly' => false])

<input
    {{ $readonly ? 'readonly' : '' }}
    {!! $attributes->merge([
        'type' => 'text',
        'class' => ($readonly ? "bg-gray-100" : ""). ' bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal'
    ]) !!}
>
