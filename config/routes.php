<?php

const ROUTES = [
    'home' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'home',
    ],
    'contact' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'contact'
    ],
    'mentionLegal' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'mentionLegal'
    ],
    'test' => [
        'controller' => App\Controller\OfferController::class,
        'method' => 'test'
    ],
    'add_rdv' => [
        'controller' => App\Controller\RDVController::class,
        'method' => 'addRdv'
    ],
    'all_rdv' => [
        'controller' => App\Controller\RDVController::class,
        'method' => 'accueil'
    ],
    'remove_rdv' => [
        'controller' => App\Controller\RDVController::class,
        'method' => 'remove'
    ],
    'details' => [
        'controller' => App\Controller\RDVController::class,
        'method' => 'details'
    ],
    'update_rdv' => [
        'controller' => App\Controller\RDVController::class,
        'method' => 'update'
    ],
    'user_register' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'register'
    ],
    'user_login' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'login'
    ],
    'user_profile' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'userProfile'
    ]

];