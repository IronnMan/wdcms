@props(['value'])

<label {{ $attributes->merge(['class' => 'sm:w-1/5 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal']) }}>
    {{ $value ?? $slot }}
</label>
