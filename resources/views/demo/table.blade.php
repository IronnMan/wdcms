<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <link rel="apple-touch-icon" type="image/png"
          href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png"/>
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="shortcut icon" type="image/x-icon"
          href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico"/>

    <link rel="mask-icon" type=""
          href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg"
          color="#111"/>


    <title>CodePen - Pagination component using Tailwindcss &amp;amp; AlpineJs</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    <script>
        window.console = window.console || function (t) {
        };
    </script>


    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>


</head>

<body translate="no">
<div class="bg-gray-100">
    <nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path
                                    d="M213.765 308.934V344.535L102.4 289.682V259.241L213.765 204.393V240.244L136.167 274.217L213.765 308.934ZM282.624 203.636L251.623 348.684C250.829 352.491 249.926 356.267 248.914 360.006C248.141 362.775 246.958 364.946 245.376 366.476C243.789 368.035 241.48 368.803 238.454 368.803C230.928 368.803 227.159 365.103 227.159 357.737C227.159 355.805 227.902 350.988 229.376 343.273L260.265 198.226C261.888 190.511 263.435 185.228 264.909 182.377C266.389 179.526 269.266 178.1 273.552 178.1C277.243 178.1 280.059 179.107 282.015 181.12C283.971 183.133 284.949 185.903 284.949 189.423C284.949 192.023 284.171 196.759 282.624 203.636ZM409.6 289.682L298.235 344.786V309.184L376.059 274.467L298.235 240.244V204.893L409.6 259.491V289.682Z"
                                    fill="white"/>
                                <path
                                    d="M481.28 0H30.72C22.5725 0 14.7588 3.67791 8.99768 10.2246C3.23656 16.7714 0 25.6506 0 34.9091L0 477.091C0 486.349 3.23656 495.229 8.99768 501.775C14.7588 508.322 22.5725 512 30.72 512H481.28C489.427 512 497.241 508.322 503.002 501.775C508.763 495.229 512 486.349 512 477.091V34.9091C512 25.6506 508.763 16.7714 503.002 10.2246C497.241 3.67791 489.427 0 481.28 0ZM404.48 23.2727C415.77 23.2727 424.96 33.7105 424.96 46.5455C424.96 59.3804 415.77 69.8182 404.48 69.8182C393.19 69.8182 384 59.3804 384 46.5455C384 33.7105 393.19 23.2727 404.48 23.2727ZM348.16 23.2727C359.45 23.2727 368.64 33.7105 368.64 46.5455C368.64 59.3804 359.45 69.8182 348.16 69.8182C336.87 69.8182 327.68 59.3804 327.68 46.5455C327.68 33.7105 336.87 23.2727 348.16 23.2727ZM481.28 477.091H30.72V93.0909H481.28V477.091ZM460.8 69.8182C449.51 69.8182 440.32 59.3804 440.32 46.5455C440.32 33.7105 449.51 23.2727 460.8 23.2727C472.09 23.2727 481.28 33.7105 481.28 46.5455C481.28 59.3804 472.09 69.8182 460.8 69.8182Z"
                                    fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="512" height="512" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline">
                            <a href="#"
                               class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700">Dashboard</a>
                            <a href="#"
                               class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Team</a>
                            <a href="#"
                               class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Projects</a>
                            <a href="#"
                               class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Calendar</a>
                            <a href="#"
                               class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Reports</a>
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
                            <div>
                                <button @click="open = !open"
                                        class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid"
                                        id="user-menu" aria-label="User menu" aria-haspopup="true"
                                        x-bind:aria-expanded="open">
                                    <img class="h-8 w-8 rounded-full"
                                         src=""
                                         alt=""/>
                                </button>
                            </div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                                <div class="py-1 rounded-md bg-white shadow-xs">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your
                                        Profile</a>
                                    <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                                        out</a>
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
        <div x-bind:class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 sm:px-3">
                <a href="#"
                   class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700">Dashboard</a>
                <a href="#"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Team</a>
                <a href="#"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Projects</a>
                <a href="#"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Calendar</a>
                <a href="#"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Reports</a>
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

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-gray-900">
                All Posts
            </h1>
        </div>
    </header>
    <main class="h-full overflow-y-auto">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8" x-data="alpineInit()" x-init="init()">
            <div class="flex flex-col">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    asdasd
                    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg relative">
                        <template x-if="isLoading">
                            <div class="absolute inset-0" style="
                             background-image: linear-gradient(
                             0deg,
                             white,
                             transparent
                             );
                             "></div>
                        </template>
                        <table class="min-w-full">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            <template x-for="i in [1,2,3,4,5,6,7,8,9]" x-if="isLoading">
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-gray-300"></div>
                                            </div>
                                            <div class="ml-4">
                                                <span
                                                    class="text-sm leading-5 text-transparent bg-gray-300 rounded-sm mb-2"
                                                    x-text="Math.random().toString(16)"></span>
                                                <div class="text-sm leading-5 text-transparent bg-gray-300 rounded-sm"
                                                     x-text="Math.random().toString(8)"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span class="text-xs leading-5 text-transparent bg-gray-300 rounded-sm mb-2"
                                              x-text="Math.random().toString(2)"></span>
                                        <div class="text-xs leading-5 text-transparent">
                                            <span x-text="Math.random().toString(3)"
                                                  class="bg-gray-300 rounded-sm"></span>
                                        </div>
                                        <div class="text-xs leading-5 text-transparent">
                                            <span x-text="Math.random().toString(3)"
                                                  class="bg-gray-300 rounded-sm"></span>
                                        </div>
                                        <div class="text-xs leading-5 text-transparent">
                                            <span x-text="Math.random().toString(2)"
                                                  class="bg-gray-300 rounded-sm"></span>
                                        </div>
                                        <div class="text-xs leading-5 text-transparent">
                                            <span x-text="Math.random().toString(7)"
                                                  class="bg-gray-300 rounded-sm"></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                      <span
                          class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-transparent">
                        Published
                      </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                        <a href="#" class="text-transparent bg-indigo-200 rounded-sm px-2">Edit</a>
                                    </td>
                                </tr>
                            </template>
                            <template x-for="post in posts" :key="post.id" x-if="!isLoading">
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                     :src="`https://i.pravatar.cc/40?u=${post.user.email}`" alt=""/>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900"
                                                     x-text="post.user.name"></div>
                                                <div class="text-sm leading-5 text-gray-500"
                                                     x-text="post.user.email"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900" x-text="post.title"></div>
                                        <div class="text-sm leading-5 text-gray-500 truncate" x-text="post.body"></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                      <span
                          class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Published
                      </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                        <a href="#"
                                           class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Edit</a>
                                    </td>
                                </tr>
                            </template>
                            </tbody>
                        </table>
                        <div class="bg-white px-4 py-3 flex items-center justify-between sm:px-6">
                            <div class="flex-1 flex justify-between sm:hidden">
                                <a role="button"
                                   x-bind:class="{'cursor-not-allowed': prevUrl == null || firstUrl == currentUrl}"
                                   @click.prevent="init(prevUrl)"
                                   x-bind:disabled="prevUrl == null || firstUrl == currentUrl"
                                   class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    Previous
                                </a>
                                <a role="button"
                                   x-bind:class="{'cursor-not-allowed': nextUrl == null || lastUrl == currentUrl}"
                                   @click.prevent="init(nextUrl)"
                                   x-bind:disabled="nextUrl == null || lastUrl == currentUrl"
                                   class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    Next
                                </a>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm leading-5 text-gray-700">
                                        Showing
                                        <span class="font-medium" x-text="firstItem()"></span>
                                        to
                                        <span class="font-medium" x-text="lastItem()"></span>
                                        of
                                        <span class="font-medium" x-text="total"></span>
                                        results
                                    </p>
                                </div>
                                <div>
                  <span class="relative z-0 inline-flex shadow-sm">
                    <button type="button"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                            x-bind:class="{'cursor-not-allowed': firstUrl == currentUrl}" @click="init(firstUrl)"
                            x-bind:disabled="firstUrl == currentUrl">
                      <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M9.70679 5.29303C9.89426 5.48056 9.99957 5.73487 9.99957 6.00003C9.99957 6.26519 9.89426 6.5195 9.70679 6.70703L6.41379 10L9.70679 13.293C9.88894 13.4816 9.98974 13.7342 9.98746 13.9964C9.98518 14.2586 9.88001 14.5094 9.6946 14.6948C9.5092 14.8803 9.25838 14.9854 8.99619 14.9877C8.73399 14.99 8.48139 14.8892 8.29279 14.707L4.29279 10.707C4.10532 10.5195 4 10.2652 4 10C4 9.73487 4.10532 9.48056 4.29279 9.29303L8.29279 5.29303C8.48031 5.10556 8.73462 5.00024 8.99979 5.00024C9.26495 5.00024 9.51926 5.10556 9.70679 5.29303V5.29303Z"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M15.7065 5.29279C15.894 5.48031 15.9993 5.73462 15.9993 5.99979C15.9993 6.26495 15.894 6.51926 15.7065 6.70679L12.4135 9.99979L15.7065 13.2928C15.8887 13.4814 15.9895 13.734 15.9872 13.9962C15.9849 14.2584 15.8798 14.5092 15.6944 14.6946C15.509 14.88 15.2581 14.9852 14.9959 14.9875C14.7337 14.9897 14.4811 14.8889 14.2925 14.7068L10.2925 10.7068C10.1051 10.5193 9.99976 10.265 9.99976 9.99979C9.99976 9.73462 10.1051 9.48031 10.2925 9.29279L14.2925 5.29279C14.4801 5.10532 14.7344 5 14.9995 5C15.2647 5 15.519 5.10532 15.7065 5.29279V5.29279Z"/>
                      </svg>
                      </button>

                      <button type="button"
                              class="-ml-px relative inline-flex items-center px-2 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                              x-bind:class="{'cursor-not-allowed': prevUrl == null || firstUrl == currentUrl}"
                              @click="init(prevUrl)" x-bind:disabled="prevUrl == null || firstUrl == currentUrl">
                      <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"/>
                      </svg>
                      </button>
                      <template x-for="(page,index) in pages()" :key="index">
                      <button type="button"
                              class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-700 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                              x-bind:class="{'cursor-not-allowed text-blue-600 hover:text-blue-600': page.isActive}"
                              x-bind:disabled="page.isActive" @click="init(page.url)">
                        <span x-text="page.name"></span>
                          </button>
                    </template>
                    <template v-if="lastUrl !== currentUrl">
                      <span
                          class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-700">
                        ...
                      </span>
                    </template>

                    <button type="button"
                            class="-ml-px relative inline-flex items-center px-2 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                            x-bind:class="{'cursor-not-allowed': nextUrl == null || lastUrl == currentUrl}"
                            @click="init(nextUrl)" x-bind:disabled="nextUrl == null || lastUrl == currentUrl">
                      <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"/>
                      </svg>
                      </button>
                      <button type="button"
                              class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                              x-bind:class="{'cursor-not-allowed': lastUrl == currentUrl}" @click="init(lastUrl)"
                              x-bind:disabled="lastUrl == currentUrl">
                      <svg fill="currentColor" class="h-5 w-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M4.29279 14.707C4.10532 14.5195 4 14.2651 4 14C4 13.7348 4.10532 13.4805 4.29279 13.293L7.58579 9.99998L4.29279 6.70698C4.11063 6.51838 4.00983 6.26578 4.01211 6.00358C4.01439 5.74138 4.11956 5.49057 4.30497 5.30516C4.49038 5.11975 4.74119 5.01458 5.00339 5.01231C5.26558 5.01003 5.51818 5.11082 5.70679 5.29298L9.70679 9.29298C9.89426 9.48051 9.99957 9.73482 9.99957 9.99998C9.99957 10.2651 9.89426 10.5195 9.70679 10.707L5.70679 14.707C5.51926 14.8945 5.26495 14.9998 4.99979 14.9998C4.73462 14.9998 4.48031 14.8945 4.29279 14.707Z"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M10.2928 14.6947C10.1053 14.5072 10 14.2529 10 13.9877C10 13.7225 10.1053 13.4682 10.2928 13.2807L13.5858 9.98771L10.2928 6.69471C10.1106 6.50611 10.0098 6.25351 10.0121 5.99131C10.0144 5.72911 10.1196 5.4783 10.305 5.29289C10.4904 5.10749 10.7412 5.00232 11.0034 5.00004C11.2656 4.99776 11.5182 5.09855 11.7068 5.28071L15.7068 9.28071C15.8943 9.46824 15.9996 9.72255 15.9996 9.98771C15.9996 10.2529 15.8943 10.5072 15.7068 10.6947L11.7068 14.6947C11.5193 14.8822 11.265 14.9875 10.9998 14.9875C10.7346 14.9875 10.4803 14.8822 10.2928 14.6947Z"/>
                      </svg>
                      </button>
                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</div>
<script>
    function alpineInit() {
        return {
            isLoading: true,
            posts: [],
            currentUrl: null,
            firstUrl: "https://jsonplaceholder.typicode.com/posts?_page=1&amp;_limit=15&amp;_expand=user",
            nextUrl: null,
            prevUrl: null,
            lastUrl: null,
            total: null,
            currentPage: 1,
            perPage: 15,
            visiblePages: 3,
            totalPages() {
                return Math.round(this.total / this.perPage);
            },
            startPage() {
                if (this.currentPage == 1) {
                    return 1;
                }
                if (this.currentPage == this.totalPages()) {
                    return this.totalPages() - this.visiblePages + 1;
                }
                return this.currentPage - 1;
            },
            endPage() {
                return Math.min(
                    this.startPage() + this.visiblePages - 1,
                    this.totalPages()
                );
            },
            pages() {
                const range = [];
                for (let i = this.startPage(); i <= this.endPage(); i += 1) {
                    range.push({
                        name: i,
                        isActive: i == this.currentPage,
                        url: `https://jsonplaceholder.typicode.com/posts?_page=${i}&amp;_limit=15&amp;_expand=user`,
                    });
                }
                return range;
            },
            firstItem() {
                return this.perPage * this.currentPage - 15 + 1;
            },
            lastItem() {
                let lastItem = this.perPage * this.currentPage;
                if (lastItem > this.total) {
                    return this.total;
                }
                return this.perPage * this.currentPage;
            },
            init(url = this.firstUrl) {
                this.isLoading = true;
                this.currentUrl = url;
                let params = new URL(this.currentUrl).searchParams;
                this.currentPage = params.get("_page");
                this.perPage = params.get("_limit");
                fetch(`${this.currentUrl}`).then((response) => {
                    this.total = response.headers.get("x-total-count");
                    let formattedLinks = [];
                    let links = response.headers.get("link");
                    if (typeof links === "string") {
                        let extractedArr = links.split(", ");
                        extractedArr.forEach((val) => {
                            let values = val.split("; ");
                            let type = values[1].slice(5, -1);
                            let url = values[0].slice(1, -1);
                            formattedLinks[type] = url;
                        });
                        this.firstUrl = formattedLinks["first"];
                        this.prevUrl = formattedLinks.prev ?
                            formattedLinks["prev"] :
                            null;
                        this.nextUrl = formattedLinks.next ?
                            formattedLinks["next"] :
                            null;
                        this.lastUrl = formattedLinks["last"];
                    }
                    response.json().then((json) => {
                        this.isLoading = false;
                        this.posts = json;
                    });
                });
            },
        };
    }
</script>


</body>

</html>
