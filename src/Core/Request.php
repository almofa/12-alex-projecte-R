<?php

namespace App\Core;

class Request
{
    private string $path;
    private string $method;

    public function __construct()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        // movies?order=release_date
        $urlArray = explode("?", $url);
        // [0 => movies,
        // 1 => order=release_date
        $this->path = $urlArray[0];
        $this->method = $_SERVER["REQUEST_METHOD"];
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    public function getMethod(): string {
        return $this->method;
    }
}