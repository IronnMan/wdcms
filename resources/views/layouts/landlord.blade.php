@extends('layouts.base')

@section('bodyStyle', 'bg-gray-100 text-gray-800 antialiased')
@section('body')
    <nav x-data="{ open: false }" class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex-shrink-0 text-white text-xl font-bold">
                        <span class="shadow-inner">Lumina</span>
                    </div>
                    <div class="hidden md:block border-gray-700 border-l ml-10">
                        <div class="ml-10 flex items-baseline text-white">
                            <a href="{{ route('admin.home') }}"
                               class="{{ request()->routeIs('admin.home')?'bg-gray-900':'' }} px-3 py-2 rounded-md text-sm font-medium hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">{{ __('dashboard') }}</a>
                            <a href="{{ route('admin.tenant') }}"
                               class="{{ request()->routeIs('admin.tenant')?'bg-gray-900':'' }} ml-4 px-3 py-2 rounded-md text-sm font-medium hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">{{ __('tenants') }}</a>
                            <a href="{{ route('admin.module') }}"
                               class="{{ request()->routeIs('admin.module')?'bg-gray-900':'' }} ml-4 px-3 py-2 rounded-md text-sm font-medium hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">{{ __('modules') }}</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <button
                            class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700"
                            aria-label="Notifications">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </button>
                        <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                    class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid"
                                    id="user-menu" aria-label="User menu" aria-haspopup="true"
                                    x-bind:aria-expanded="open">
                                <x-avatar :name="Auth::guard('landlord')->user()->name" />
                            </button>
                            <div x-show="open"  x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                                <div class="py-1 rounded-md bg-white shadow-xs">
                                    <x-btn-form :action="route('admin.logout')">{{ __('sign out') }}</x-btn-form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button @click="open = !open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white"
                            x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" x-bind:aria-expanded="open">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path x-bind:class="{'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-bind:class="{'hidden': !open, 'inline-flex': open }" class="hidden"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div :class="{'flex': open, 'hidden': !open}" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 sm:px-3">
                <a href="#"
                   class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700">{{ __('dashboard') }}</a>
                <a href="#"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">{{ __('team') }}</a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                             src=""
                             alt=""/>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">
                            Tom Cook
                        </div>
                        <div class="mt-1 text-sm font-medium leading-none text-gray-400">
                            tom@example.com
                        </div>
                    </div>
                </div>
                <div class="mt-3 px-2" role="menu" aria-orientation="vertical" aria-labelledby="user-menu"
                     role="menuitem">
                    <a href="#"
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                       role="menuitem">Your Profile</a>
                    <a href="#"
                       class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                       role="menuitem">Settings</a>
                    <a href="#"
                       class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                       role="menuitem">Sign out</a>
                </div>
            </div>
        </div>
    </nav>

    @hasSection('title')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold leading-tight text-gray-900">
                @yield('title')
            </h1>
        </div>
    </header>
    @endif

    <main class="h-full overflow-y-auto">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 md:px-4">
            <div class="flex flex-col">
                <div class="-my-2 py-2 overflow-x-auto px-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

@endsection
