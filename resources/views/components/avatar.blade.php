@props(['name'])

@php
$avatar = new App\Utils\Multiavatar($name, null, null);
@endphp

<div {{ $attributes->merge(['style' => 'width:38px;height:38px', 'class' => 'shadow rounded-full']) }}>
    {!!  $avatar->svgCode !!}
</div>
