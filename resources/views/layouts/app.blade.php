<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('/assets/images/default/logo-small.png') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
        <script defer src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
        <script defer src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
        <script defer src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    {{-- Laravel Default Body tag --}}
    {{-- <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow dark:bg-gray-800">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body> --}}
    {{-- Laravel Default Body Tag --}}

    <body x-data="main" class="relative overflow-x-hidden text-sm antialiased font-normal font-nunito"
        :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout, $store.app
            .rtlClass
        ]">

        <!-- sidebar menu overlay -->
        <div x-cloak class="fixed inset-0 bg-[black]/60 z-50 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
            @click="$store.app.toggleSidebar()"></div>

        <!-- screen loader -->
        <div
            class="screen_loader fixed inset-0 bg-[#fafafa] dark:bg-[#060818] z-[60] grid place-content-center animate__animated">
            <!-- Edge Y Ring Spinner s4 -->
            <div class="w-12 h-12 border-yellow-500 border-solid rounded-full shadow-md animate-spin border-y-8 border-t-transparent">
            </div>
        </div>

        <div class="fixed z-50 bottom-6 ltr:right-6 rtl:left-6" x-data="scrollToTop">
            <template x-if="showTopButton">
                <button type="button"
                    class="btn btn-outline-primary rounded-full p-2 animate-pulse bg-[#fafafa] dark:bg-[#060818] dark:hover:bg-primary"
                    @click="goToTop">
                    <svg width="24" height="24" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                            fill="currentColor" />
                        <path
                            d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                            fill="currentColor" />
                    </svg>
                </button>
            </template>
        </div>

        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("scrollToTop", () => ({
                    showTopButton: false,
                    init() {
                        window.onscroll = () => {
                            this.scrollFunction();
                        };
                    },

                    scrollFunction() {
                        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                            this.showTopButton = true;
                        } else {
                            this.showTopButton = false;
                        }
                    },

                    goToTop() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    },
                }));
            });
        </script>

        <x-common-layout-componenet.theme-customiser />

        <div class="min-h-screen text-black main-container dark:text-white-dark" :class="[$store.app.navbar]">

            {{-- @if (Gate::allows('isAdmin')) --}}
            <x-common-layout-componenet.sidebar />
            {{-- @elseif (Gate::allows('isProfessional'))
            professional
            @elseif (Gate::allows('isPartner'))
            partner
            @elseif (Gate::allows('isCustomer'))
            customer
            @else
            other
            @endif --}}

            <div class="flex flex-col min-h-screen main-content">
                <x-common-layout-componenet.header />

                <div class="p-6 dvanimation animate__animated" :class="[$store.app.animation]">
                    {{ $slot }}

                </div>
                <x-common-layout-componenet.footer />
            </div>
        </div>
        <script src="{{ asset('assets/js/alpine-collaspe.min.js') }}"></script>
        <script src="{{ asset('assets/js/alpine-persist.min.js') }}"></script>
        <script defer src="{{ asset('assets/js/alpine-ui.min.js') }}"></script>
        <script defer src="{{ asset('assets/js/alpine-focus.min.js') }}"></script>
        <script defer src="{{ asset('assets/js/alpine.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
    </body>
</html>
