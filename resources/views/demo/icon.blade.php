@extends('layouts.app')

@section('content')
    <main class="bg-white container mx-auto">
        <div class="px-4 sm:px-6 lg:px-16">
            <div class="grid grid-cols-2 items-start gap-x-8 sm:gap-x-12 lg:gap-x-16 gap-y-4 sm:gap-y-8 max-w-container mx-auto pt-6 sm:pt-8 pb-12">
                <ul class="gap-8 text-center text-xs leading-4 col-start-1 row-start-2">
                    @foreach((new \Illuminate\Filesystem\Filesystem())->allFiles(config('wdcms.icon.path')) as $file)
                        @continue($file->getExtension() !== 'svg')

                        <li class="relative" style="width: 200px;display: block;margin-right: 20px;float: left">
                            <div>
                                <span class="mb-3 h-24 block" style="float: left">
                                    <x-dynamic-component :component="config('wdcms.icon.prefix').'-'.$file->getFilenameWithoutExtension()" width="15" />
                                </span>
                                {{ $file->getFilenameWithoutExtension() }}
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </main>



@endsection
