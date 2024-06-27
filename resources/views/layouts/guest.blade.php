<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset ('/assets/images/default/logo-small.png') }}" />

        <title>{{ config('app.name', 'Bizdefines') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- theme setting --}}
        <script src="{{ asset ('/assets/js/perfect-scrollbar.min.js') }}"></script>
        <script defer src="{{ asset ('/assets/js/popper.min.js') }}"></script>
        {{-- theme setting --}}
    </head>
    <body x-data="main" class="font-sans antialiased text-gray-900">

        <!-- screen loader start -->
        <div
            class="screen_loader fixed inset-0 bg-[#fafafa] dark:bg-[#060818] z-[60] grid place-content-center animate__animated">
            <!-- Edge Y Ring Spinner s4 -->
            <div class="w-12 h-12 border-yellow-500 border-solid rounded-full shadow-md animate-spin border-y-8 border-t-transparent">
            </div>
        </div>
        <!-- screen loader end -->

        {{-- Scroll to top Button start--}}
        <div class="fixed z-50 bottom-6 right-6" x-data="scrollToTop">
            <template x-if="showTopButton">
                <button type="button" class="p-2 rounded-full btn btn-outline-primary animate-pulse" @click="goToTop">
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
        {{-- Scroll to top Button end--}}

        <div class="min-h-screen text-black main-container dark:text-white-dark">
            {{ $slot }}
        </div>

        {{-- main Laravel Slot content here --}}
            {{-- <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900">
                <div>
                    <a href="/">
                        <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                    </a>
                </div>

                <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div> --}}
        {{-- main Laravel Slot content here --}}


        {{-- theme settings --}}
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
        <script src="{{ asset ('/assets/js/alpine-collaspe.min.js') }}"></script>
        <script src="{{ asset ('/assets/js/alpine-persist.min.js') }}"></script>
        <script defer src="{{ asset ('/assets/js/alpine-ui.min.js') }}"></script>
        <script defer src="{{ asset ('/assets/js/alpine-focus.min.js') }}"></script>
        <script defer src="{{ asset ('/assets/js/alpine.min.js') }}"></script>
        <script src="{{ asset ('/assets/js/custom.js') }}"></script>
        {{-- theme settings --}}
    </body>
</html>
