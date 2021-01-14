<?php


namespace App\Controllers;
use App\Core\Controller;
use App\Core\App;
use App\Model\UserModel;
use App\Core\Router;
use App\Database;
use App\Entity\User;
use App\Utils\MyLogger;
use Exception;
use PDO;
use PDOException;

class AuthController extends Controller
{
    public function login()
    {
        return $this->response->renderView('auth/login', 'default');
    }

    public function checkLogin()
    {
        $messages = [];
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if (!empty($username) && !empty($password)) {
            $userModel = App::getModel(UserModel::class);
            $router = App::get(Router::class);

            $user = $userModel->findOneBy(["username" => $username]);
            if (!empty($user)) {
                App::get('flash')->set('message', 'Has entrat');
                App::get("redirect")::redirect("movies");
            } else {

                App::get('flash')->set("message", "No s'ha pogut iniciar sessió");
                App::get('router')->redirect("/login");
            }
        }
    }

    public function logout()
    {
        session_unset();
        unset($_SESSION);
        session_destroy();
        App::get('router')->redirect("/");
    }
}