<?php


namespace App\Core\Exception;
use Throwable;

class AuthorizationException extends AppException
{
    public function __construct($message = "No tens permís", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}