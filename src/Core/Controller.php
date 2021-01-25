<?php

namespace App\Core;

abstract class Controller
{
    public Response $response;

    public function __construct() {
        $this->response = App::get(Response::class);
    }
}