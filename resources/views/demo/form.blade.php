@extends('layouts.demo')

@section('content')

    <x-form action="?">

        <x-form-group id="email">
            <x-slot name="label">Email</x-slot>
            <x-slot name="input">
                <x-inputs.text name="email" id="email"></x-inputs.text>
                <div class="block mt-1">We'll never share your email with anyone else.</div>
            </x-slot>
        </x-form-group>

        <x-form-group id="phone">
            <x-slot name="label">Email</x-slot>
            <x-slot name="input">
                <x-inputs.text name="email" id="phone"></x-inputs.text>
            </x-slot>
        </x-form-group>

{{--        <div class="flex flex-wrap  mb-3">--}}
{{--            <label for="inputEmail3" class="sm:w-1/5 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal text-right">Email</label>--}}
{{--            <div class="sm:w-4/5 pr-4 pl-4">--}}
{{--                <input type="email" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="inputEmail3">--}}
{{--            </div>--}}
{{--        </div>--}}


    </x-form>

@endsection
