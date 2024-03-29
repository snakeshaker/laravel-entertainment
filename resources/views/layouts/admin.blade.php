<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
            <div @click.away="open = false"
                 class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-slate-100 md:w-64 dark:text-gray-200 dark:bg-gray-800" x-data="{ open: false }">
                <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
                    <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">Развлекательный центр</a>
                    <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
                    <x-admin-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/user.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/user.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Все пользователи') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/category.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/category.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Развлечения') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.food-categories.index')" :active="request()->routeIs('admin.food-categories.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/food-category.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/food-category.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Категории блюд') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.menus.index')" :active="request()->routeIs('admin.menus.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/menu.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/menu.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Блюда') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.tables.index')" :active="request()->routeIs('admin.tables.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/table.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/table.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Столы/дорожки/места') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.reservations.index')" :active="request()->routeIs('admin.reservations.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/reservation.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/reservation.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Бронирования') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.reviews.index')" :active="request()->routeIs('admin.reviews.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/review.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/review.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Отзывы') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.news.index')" :active="request()->routeIs('admin.news.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/news.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/news.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Новости') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.tech-support.index')" :active="request()->routeIs('admin.tech-support.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/tech_support.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/tech_support.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Заявки ТП') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.songs.index')" :active="request()->routeIs('admin.songs.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/song.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/song.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Песни') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/order.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/order.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Заказы') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.galleries.index')" :active="request()->routeIs('admin.galleries.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/gallery.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/gallery.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Фотогалерея') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.contacts.index')" :active="request()->routeIs('admin.contacts.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/contact.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/contact.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Контакты') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('admin.reports.index')" :active="request()->routeIs('admin.reports.index')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/report.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/report.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('Отчетность') }}
                    </x-admin-nav-link>
                    <x-admin-nav-link :href="route('mainpage')" :active="request()->routeIs('mainpage')">
                        <picture>
                            <source srcset="{{ asset('assets/admin/dark/home.svg') }}" media="(prefers-color-scheme: light)">
                            <img src="{{ asset('assets/admin/home.svg') }}" alt="" width="32" height="32" class="inline-block">
                        </picture>
                        {{ __('На главную') }}
                    </x-admin-nav-link>
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <picture>
                                <source srcset="{{ asset('assets/admin/dark/profile.svg') }}" media="(prefers-color-scheme: light)">
                                <img src="{{ asset('assets/admin/profile.svg') }}" alt="" width="24" height="24" class="inline-block mr-2">
                            </picture>
                            <span>{{ Auth::user()->first_name }}</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-700">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                        {{ __('Выйти') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <main class="w-[calc(100%-256px)]">
                <div>
                    @if (session()->has('danger'))
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                            <span class="font-medium">{{ session()->get('danger') }}</span>
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                            <span class="font-medium">{{ session()->get('success') }}</span>
                        </div>
                    @endif
                    @if (session()->has('warning'))
                        <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800" role="alert">
                            <span class="font-medium">{{ session()->get('warning') }}</span>
                        </div>
                    @endif
                    @if (session()->has('info'))
                        <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                            <span class="font-medium">{{ session()->get('info') }}</span>
                        </div>
                    @endif
                    @if (session()->has('dark'))
                        <div class="p-4 mb-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300" role="alert">
                            <span class="font-medium">{{ session()->get('dark') }}</span>
                        </div>
                    @endif
                </div>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
