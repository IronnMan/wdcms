@section('title', 'Module Manage')

<div>

    @if($notInstall->count() > 0)
        <h3><strong class="text-red-700 bold">{{ $notInstall->count() }}</strong> new Modules!</h3>
        <div class="container pt-8 mx-auto" x-data="loadEmployees()">
            <input x-ref="searchField" x-model="search" x-on:keydown.window.prevent.slash="$refs.searchField.focus()" placeholder="Search for an employee..." type="search" class="block w-full bg-gray-200 focus:outline-none focus:bg-white focus:shadow text-gray-700 font-bold rounded-lg px-4 py-3">
            <div class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <template x-for="item in filteredEmployees" :key="item">
                    <div class="flex items-center shadow cursor-pointer hover:bg-indigo-100 hover:shadow-lg hover:rounded transition duration-150 ease-in-out transform hover:scale-105 p-3">
                        <template x-if="!!item[1].logo">
                            <img class="w-10 h-10 rounded-sm mr-4" :src="`${item[1].logo}`" />
                        </template>
                        <template x-if="!item[1].logo">
                            <div class="w-10 h-10 rounded-sm mr-4 text-white" :class="iconColor">
                                <x-icon-s-cube></x-icon-s-cube>
                            </div>
                        </template>

                        <div class="text-sm">
                            <p class="text-gray-900 leading-none mb-1" x-text="item[1].name"></p>
                            <p class="text-gray-600 text-xs" x-text="item[1].desc"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        <script>
            var sourceData = Object.entries(@json($notInstall));
            function loadEmployees() {
                return {
                    search: '',
                    myForData: sourceData,
                    get iconColor() {
                        const arr = ['purple', 'green', 'red', 'yellow', 'gray'];
                        return 'bg-' + arr[Math.floor((Math.random()*arr.length))] + '-700'
                    },
                    get filteredEmployees() {
                        if (this.search === '') {
                            return this.myForData
                        }
                        return this.myForData.filter(item => {
                            return item[1].name.toLowerCase().includes(this.search.toLowerCase()) ||
                                item[1].desc.toLowerCase().includes(this.search.toLowerCase())
                        })
                    }
                }
            }
        </script>

        <hr class="my-6 border-gray-700"/>
    @endif

    <x-modal wire:model="moduleModal">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">

                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg">
                        {{ __('create module') }}
                    </h3>

                    <div class="mt-2">
                        <x-form submit="create">
                            <x-slot name="form">
                                <!-- Token Name -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="id" value="{{ __('module id') }}" />
                                    <x-input id="id" type="text" class="mt-1 block w-full" wire:model.defer="moduleForm.name" autofocus />
                                    <x-input-error for="id" class="mt-2" />
                                </div>
                            </x-slot>

                            <x-slot name="actions">
                                <x-action-message class="mr-3" on="created">
                                    {{ __('Created.') }}
                                </x-action-message>

                                <x-btn>
                                    {{ __('Create') }}
                                </x-btn>
                            </x-slot>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>

    </x-modal>

{{--    <div class="inset-x-0 px-4 pt-6 z-50 sm:px-0 sm:flex sm:items-top my-6 bg-purple-700">--}}
{{--        未安装模块（{{ $notInstall->count() }}个）：{{ $notInstall->pluck('name')->implode(',') }}--}}
{{--    </div>--}}

{{--    <button wire:click="$toggle('moduleModal')" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mb-3">create</button>--}}

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">NAME</th>
                    <th class="px-4 py-3">{{ __('desc') }}</th>
                    <th class="px-4 py-3">{{ __('status') }}</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($modules as $module)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        {{ $module->getName() }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $module->get('description') }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        @if($module->isEnabled())
                            <button
                                class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green mb-3"
                                aria-label="Edit" wire:click="updateStatus('{{ $module->getName() }}', 0)">
                                点击禁用
                            </button>
                        @else
                            <button
                                class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red mb-3"
                                aria-label="Edit" wire:click="updateStatus('{{ $module->getName() }}', 1)">
                                点击激活
                            </button>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <button
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit" wire:click="edit('{{ $module->getName() }}')">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

