<?php

namespace App\Core\Exception;

use Exception;
use Throwable;

class NotFoundException extends Exception
{
public function __construct($message = "Not found exception", $code = 0, Throwable $previous = null)
{
    parent::__construct($message, $code, $previous);
}

}