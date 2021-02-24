<?php


namespace App\Controllers;


use App\Core\App;
use App\Core\Controller;
use App\Core\Router;
use App\Model\PartnerModel;
use App\Model\UserModel;


class UserController extends Controller
{
    function index(): string
    {


        $userModel = App::getModel(UserModel::class);
        $router = App::get(Router::class);
        $users = $userModel->findAll(["username" => "ASC"]);
        $message = App::get("flash")::get("message");
        return $this->response->renderView("users", "admin",
            compact( 'users', 'router','message'));
    }






}