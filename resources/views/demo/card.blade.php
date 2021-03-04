@extends('layouts.demo')

@section('content')


    <section class="w-1/5">
        <x-dropdown>
            <x-slot name="on">点开</x-slot>
            <x-slot name="bd">新年快乐</x-slot>
        </x-dropdown>
    </section>

    <x-card>新年好</x-card>

    <x-card class="mt-10">
        <x-slot name="head">head</x-slot>
        新年好
    </x-card>

{{--    <x-card class="mt-10">--}}
{{--        <x-slot name="head">head</x-slot>--}}
{{--        新年好--}}
{{--        <x-slot name="foot">foot</x-slot>--}}
{{--    </x-card>--}}


{{--    <div>--}}
{{--        <x-badge>1</x-badge>--}}
{{--        <x-badge class="bg-green-600">提示</x-badge>--}}
{{--    </div>--}}

@endsection
