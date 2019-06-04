<?php

return [

    // logo icon
    'icon' => 'fa-address-card',

    // available user roles
    'roles' => ['Admin','Tecnico','Visitante'],

    // controllers used by package
    'controllers' => [
        'admin' => [
            'home' => 'Kjjdion\Laracrud\Http\Controllers\Admin\HomeController',
            'user' => 'Kjjdion\Laracrud\Http\Controllers\Admin\UserController',
        ],
        'auth' => [
            'login' => 'Kjjdion\Laracrud\Http\Controllers\Auth\LoginController',
            'profile' => 'Kjjdion\Laracrud\Http\Controllers\Auth\ProfileController',
        ],
    ],

];
