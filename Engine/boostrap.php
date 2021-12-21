<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\cms;
use Engine\DI\di;
use Engine\Service\AbstractProvider;

try{

    $di = new di();

    $services = require __DIR__ . '\Config\service.php'; // массив классов

    //print_r($services); // вывод массива классов


    foreach ($services as $service)
    {
        $provider = new $service($di);
        $provider->init();
    }

    $cms = new cms($di);
    $cms->run();

}catch(\ErrorException $e){

    echo $e->getMessage();

}