<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StayFinder') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">
    
   <header class="fixed top-0 left-0 w-full bg-gradient-to-r from-primary to-secondary text-white shadow-lg z-10" x-data="{ open: false }">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <span class="text-3xl font-extrabold tracking-wide">
            {{ config('app.name', 'StayFinder') }}
        </span>

        <button @click="open = !open" class="md:hidden focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                <path :class="{'inline-flex': open, 'hidden': !open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <nav :class="{'block': open, 'hidden': !open}" class="absolute top-full left-0 w-full bg-gradient-to-r from-primary to-secondary md:static md:flex md:items-center md:space-x-4 md:w-auto md:bg-transparent hidden">
            <div class="flex flex-col md:flex-row md:items-center md:space-x-4 p-4 md:p-0 space-y-2 md:space-y-0">
                <a href="{{ route('properties.index') }}" class="px-4 py-2 rounded-lg bg-white text-primary font-semibold hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white">
                    Nos Biens
                </a>

                @auth
                    <a href="{{ route('bookings.index') }}" class="px-4 py-2 rounded-lg bg-white text-primary font-semibold hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white">
                        Mes Réservations
                    </a>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg border-2 border-white font-medium hover:bg-white hover:text-primary focus:outline-none focus:ring-2 focus:ring-white">
                        Se connecter
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg bg-secondary bg-opacity-90 font-medium hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-white">
                        S'inscrire
                    </a>
                @endguest

                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ url('/admin') }}" class="px-4 py-2 rounded-lg bg-white text-primary font-semibold hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white">
                            Admin Panel
                        </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="p-2 rounded-lg hover:bg-white hover:text-primary focus:outline-none focus:ring-2 focus:ring-white" aria-label="Se déconnecter">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-13v1" />
                            </svg>
                        </button>
                    </form>
                @endauth
            </div>
        </nav>
    </div>
</header>


    <main class="container mx-auto px-4 py-8 mt-24 mb-24">
        @yield('content')
    </main>

    <footer class="fixed bottom-0 left-0 w-full bg-primary text-white shadow-inner">
        <div class="container mx-auto px-6 py-4 text-center text-sm">
            &copy; {{ date('Y') }} {{ config('app.name', 'StayFinder') }}. Tous droits réservés.
        </div>
    </footer>


    @livewireScripts
</body>
</html>