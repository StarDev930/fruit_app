<?php

use App\Controller\FruitController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('fruit_list', '/fruit')->controller([FruitController::class, 'list'])->methods(['GET']);
    $routes->add('add_fruit', '/add-fruit')->controller([FruitController::class, 'add'])->methods(['POST']);
    $routes->add('fav_fruit_add', '/add-fav')->controller([FruitController::class, 'addFavourite'])->methods(['GET']);
    $routes->add('fav_fruit_list', '/fav-fruit')->controller([FruitController::class, 'favFruitsList'])->methods(['GET']);
};