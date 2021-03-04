@section('title', 'Tenant Manage')

<div>
    <x-modal wire:model="tenantModal">
        <x-card>
            <x-slot name="head">{{ __('create tenant') }}</x-slot>
            <x-form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
                <!-- Token Name -->
                <div class="flex flex-wrap mb-3">
                    <x-label for="tenant_id" value="{{ __('tenant id') }}" />
                    <div class="sm:w-4/5 pr-4 pl-4">
                        <x-input id="tenant_id" type="text" wire:model.defer="tenant_id" autofocus readonly="{{ $editMode }}" />
                        <x-input-error for="tenant_id" class="mt-2" />
                    </div>
                </div>
                <div class="flex flex-wrap mb-3">
                    <x-label for="name" value="{{ __('tenant name') }}" />
                    <div class="sm:w-4/5 pr-4 pl-4">
                        <x-input id="name" type="text"  wire:model.defer="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>
                </div>
                <div class="flex flex-wrap mb-3">
                    <x-label for="email" value="{{ __('tenant admin email') }}" />
                    <div class="sm:w-4/5 pr-4 pl-4">
                        <x-input id="email" type="email"  wire:model.defer="email" />
                        <x-input-error for="email" class="mt-2" />
                        <div>租户管理员信息，默认密码：password</div>
                    </div>
                </div>
                <div class="flex flex-wrap mb-3">
                    <x-label for="email" value="{{ __('modules') }}" />
                    <div class="sm:w-4/5 pr-4 pl-4">
                        @foreach($modules as $module)
                            @continue($module->getName()=='Core')
                            <label class="cursor-pointer">
                                <input type="checkbox" wire:model.defer="module.{{strtolower($module->getName())}}">
                                {{ $module->get('description') }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <x-action-message class="mr-3" on="created">
                    {{ __('created') }}
                </x-action-message>

                <x-btn submit class="mt-5">
                    {{ $editMode ? __('update') : __('create') }}
                </x-btn>
            </x-form>
        </x-card>
    </x-modal>

    <x-btn wire:click="$toggle('tenantModal')" class="mb-2">{{ __('create') }}</x-btn>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">{{ __('name') }}</th>
                    <th class="px-4 py-3">{{ __('domains') }}</th>
                    <th class="px-4 py-3">{{ __('created_at') }}</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($tenants as $tenant)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        {{ $tenant['id'] }}
                    </td>
                    <td class="px-4 py-3">
                        {{ $tenant['name'] }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <div>
                            @foreach($tenant->domains as $domain)
                                <div><a href="{{ $domain->getLink() }}" target="_blank" class="underline">{{ $domain->getLink() }}</a></div>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $tenant['created_at'] }}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <a wire:click="edit('{{ $tenant->id }}')" class="cursor-pointer">
                                <x-icon-s-server class="w-4"></x-icon-s-server>
                            </a>
                            <a wire:click="delete('{{ $tenant->id }}')" class="cursor-pointer">
                                <x-icon-o-trash class="w-4"></x-icon-o-trash>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if($tenants->hasPages())
        <div class="px-4 py-3 text-gray-500 uppercase border-t">
            {{ $tenants->links() }}
        </div>
        @endif
    </div>

</div>
