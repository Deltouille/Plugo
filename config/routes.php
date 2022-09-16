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
    ]

];