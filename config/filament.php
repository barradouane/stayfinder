<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Broadcasting
    |--------------------------------------------------------------------------
    |
    | By uncommenting the Laravel Echo configuration, you may connect Filament
    | to any Pusher-compatible websockets server.
    |
    | This will allow your users to receive real-time notifications.
    |
    */

    'broadcasting' => [

        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'wsHost' => env('VITE_PUSHER_HOST'),
        //     'wsPort' => env('VITE_PUSHER_PORT'),
        //     'wssPort' => env('VITE_PUSHER_PORT'),
        //     'authEndpoint' => '/broadcasting/auth',
        //     'disableStats' => true,
        //     'encrypted' => true,
        //     'forceTLS' => true,
        // ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | This is the storage disk Filament will use to store files. You may use
    | any of the disks defined in the `config/filesystems.php`.
    |
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Assets Path
    |--------------------------------------------------------------------------
    |
    | This is the directory where Filament's assets will be published to. It
    | is relative to the `public` directory of your Laravel application.
    |
    | After changing the path, you should run `php artisan filament:assets`.
    |
    */

    'assets_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Cache Path
    |--------------------------------------------------------------------------
    |
    | This is the directory that Filament will use to store cache files that
    | are used to optimize the registration of components.
    |
    | After changing the path, you should run `php artisan filament:cache-components`.
    |
    */

    'cache_path' => base_path('bootstrap/cache/filament'),

    /*
    |--------------------------------------------------------------------------
    | Livewire Loading Delay
    |--------------------------------------------------------------------------
    |
    | This sets the delay before loading indicators appear.
    |
    | Setting this to 'none' makes indicators appear immediately, which can be
    | desirable for high-latency connections. Setting it to 'default' applies
    | Livewire's standard 200ms delay.
    |
    */

    'livewire_loading_delay' => 'default',

    /*
    |--------------------------------------------------------------------------
    | System Route Prefix
    |--------------------------------------------------------------------------
    |
    | This is the prefix used for the system routes that Filament registers,
    | such as the routes for downloading exports and failed import rows.
    |
    */

    'system_route_prefix' => 'filament',
        /*
    |--------------------------------------------------------------------------
    | Authentication & Middleware
    |--------------------------------------------------------------------------
    |
    | Nous utilisons le guard "web" (Breeze) et la Gate viewFilament
    | pour restreindre l'accès au panneau aux seuls admins.
    |
    */

    'auth' => [
        // Passe du guard 'filament' au guard 'web' (celui de Breeze)
        'guard' => 'web',

        // Désactive la page de login interne Filament
        'pages' => [
            'login'  => null,
            'logout' => \Filament\Http\Livewire\Auth\Logout::class,
        ],
    ],

    'middleware' => [
        // Groupe de base appliqué sur /admin
        'base' => [
            'web',               // sessions & CSRF Breeze
            'auth',              // authentification Breeze
            'can:viewFilament',  // notre Gate définie dans AppServiceProvider
        ],

        // Les autres groupes restent inchangés :
        'auth' => \Filament\Http\Middleware\Authenticate::class,
        'admin' => \Filament\Http\Middleware\Authorize::class,
        'api' => \Filament\Http\Middleware\VerifyApiToken::class,
        'pages' => \Filament\Http\Middleware\Authorize::class,
    ],


];
