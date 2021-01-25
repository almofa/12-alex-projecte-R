<?php
ini_set("session.cookie_httponly", 1);
ini_set("session.cookie_secure",0);

session_name('APP');
session_start();
if(isset($_SESSION["limit"])){
    $_SESSION['limit'] = time();
}elseif ((time()-$_SESSION['limit']) > 900){
    session_regenerate_id(true);
    $_SESSION['limit'] = time();
}

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;
use App\Core\Exception\NotFoundException;
use App\Core\Response;
use App\Database;
use App\Model\UserModel;
use App\Utils\MyLogger;
use App\Utils\MyMail;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use App\Core\Helpers\FlashMessage;

$flash = new FlashMessage();
App::bind("flash", $flash);

$redirect = new \App\Core\Router();
App::bind("redirect", $redirect);

$config = require_once __DIR__ . '/../config/config.php';
App::bind("config", $config);

App::bind("DB", Database::getConnection());
App::bind(Response::class, new Response());

$myLogger = new MyLogger("app");
$myLogger->pushHandler(new StreamHandler(__DIR__."/../{$config["logfile"]}", $config["loglevel"]));
App::bind(MyLogger::class, $myLogger);

// The load method acts as a factory. We pass the config
// data and returns a myMail object
$myMail = MyMail::load($config["mailer"]);
App::bind(MyMail::class, $myMail);

$loggedUser = $_SESSION["loggedUser"] ?? 0;
$id = filter_var($loggedUser, FILTER_VALIDATE_INT);
if (!empty($id)) {
    try {
        App::bind('user', App::getModel(UserModel::class)->find($id));
    }
    catch (NotFoundException $notFoundException) {
        App::bind('user',null);
    }
}
else
    App::bind('user', null);