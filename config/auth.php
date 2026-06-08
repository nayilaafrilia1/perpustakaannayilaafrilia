<?php

use App\Models\ModelUser;
use App\Models\ModelPeminjam;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
   'guards' => [

    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    'peminjam' => [
        'driver' => 'session',
        'provider' => 'peminjam',
    ],

],
    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [

    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],

    'peminjam' => [
        'driver' => 'eloquent',
        'model' => App\Models\Peminjam::class,
    ],

],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */
    'passwords' => [

        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'peminjams' => [
            'provider' => 'peminjams',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => 10800,
];
