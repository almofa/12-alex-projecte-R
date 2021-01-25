<?php


namespace App\Core\Exception;


use App\Core\App;
use App\Core\Response;
use Exception;
use Throwable;

class AppException extends Exception
{
    /**
     * AppException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "Internal server error", $code = 500,
                                Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function handleException(): string
    {
        $message = $this->getMessage();
        $code = $this->getCode();

        // get the http status related to the error code
        // for instancd: 404 -> 404 Not found
        $httpStatus = $this->getHttpStatus();

        // HTTP/1.1 404 Not found
        header($_SERVER["SERVER_PROTOCOL"] . ' ' . $httpStatus);

        $response = App::get(Response::class);
        return $response->renderView('error', 'default', compact('message', 'code'));
    }

    private function getHttpStatus(): string
    {
        switch ($this->getCode()) {
            case 404:
                $status = "404 Not Found";
                break;

            case 403:
                $status = "403 Forbidden";
                break;

            default:
                $status = "500 Internal Server Error";

        }
        return $status;
    }
}