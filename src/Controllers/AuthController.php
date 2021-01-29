<?php


namespace App\Controllers;
use App\Core\Controller;
use App\Core\App;
use App\Core\Helpers\FlashMessage;
use App\Core\Security;
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
        $message = App::get("flash")::get("message");
        return $this->response->renderView('auth/login', 'default', compact('message'));
    }

    public function register()
    {

        $message = App::get("flash")::get("message");
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $username = filter_input(INPUT_POST, 'user');
            $password = filter_input(INPUT_POST, 'password');
            $password2 = filter_input(INPUT_POST, 'password2');
            $email = filter_input(INPUT_POST, 'email');

            $user = new User();
            if($password === $password2) {

                $passwordencode = Security::encode($password);
                $pdo = App::get("DB");
                $userModel = new UserModel($pdo);
                $user->setPassword($passwordencode);
                $user->setUsername($username);
                $user->setRole("ROLE_USER");
                $userModel->save($user);
                App::get('flash')->set('message', 'Inicia sessió per validar');
                App::get("redirect")::redirect("login");

            }
        }
        return $this->response->renderView('login-register', 'default', compact('message'));
    }

    public function checkLogin()
    {
        $messages = [];
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $security = new Security();
        if (!empty($username) && !empty($password)) {
            $pdo = App::get("DB");
            $userModel = new UserModel($pdo);
            $router = App::get(Router::class);
            $user = $userModel->findOneBy(["username" => $username]);
            if (!empty($user)) {

              $userPassword = $user->getPassword();
                if(Security::checkPassword($password,$userPassword)) {
                    $_SESSION["loggedUser"] = $user->getId();

                    App::get('flash')->set('message', 'Has entrat');
                    App::get("redirect")::redirect("");
                }
            } else {

               $message = App::get('flash')->set("message", "No s'ha pogut iniciar sessió");
                App::get('redirect')->redirect("login");
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        setcookie(session_name());
        App::get('redirect')->redirect("");
        return $this->response->renderView('auth/login');
    }
}