@props(['type' => 'success'])

@php
    switch ($type){
        case 'danger':
            $icon = 'icon-o-exclamation';
            $bgColor = 'bg-red-500';
            break;
        case 'success':
            $icon = 'icon-o-exclamation-circle';
            $bgColor = 'bg-green-500';
            break;
        case 'info':
        default:
            $icon = 'icon-o-information-circle';
            $bgColor = 'bg-blue-500';
            break;
    }

@endphp

<div class="flex items-center justify-between shadow-md {{ $bgColor }} text-white py-2 px-4 my-2" x-data="{ isShow:true }" x-show="isShow">
    <x-dynamic-component :component="$icon" width="15"/>
    <p class="flex-grow text-sm md:text-xs xl:text-md pl-1">{{ $slot }}</p>
    <a class="text-sm ml-4 md:text-xs xl:text-md cursor-pointer" @click="isShow=false">
        x
    </a>
</div>
