@props(['head', 'foot'])

<div  {{ $attributes->merge(['class' => 'relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300']) }}>
    @if(isset($head))
        <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">{{ $head }}</div>
    @endif

    <div class="flex-auto p-6">
        {{ $slot }}
    </div>

    @if(isset($foot))
    <div class="py-3 px-6 bg-gray-200 border-t-1 border-gray-300 text-gray-700">
        {{ $foot }}
    </div>
    @endif
</div>
