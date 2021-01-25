<?php

use App\Core\App;
use App\Core\Exception\AppException;
use App\Core\Request;
use App\Core\Router;



require_once __DIR__ . '/../src/bootstrap.php';

try {


    $request = new Request();
    $url = $request->getPath();


    $router = new Router();
    require_once __DIR__ . '/../config/routes.php';


    App::bind(Router::class, $router);

    echo $router->route($url, $request->getMethod());
}catch (AppException $appException) {
    echo $appException->handleException();
}
