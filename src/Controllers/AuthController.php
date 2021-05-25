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
        $pdo = App::get("DB");
        $message = App::get("flash")::get("message");
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $username = filter_input(INPUT_POST, 'user');
            if(empty($username)){
                App::get('flash')->set('message', 'El camp usuari és obligatori');
                App::get("redirect")::redirect("register");
            }

            $password = filter_input(INPUT_POST, 'password');
            if(empty($password)){
                App::get('flash')->set('message', 'El camp contraseña és obligatori');
                App::get("redirect")::redirect("register");
            }
            $password2 = filter_input(INPUT_POST, 'password2');
            if(empty($password2)){
                App::get('flash')->set('message', 'Has de validar la contrasenya');
                App::get("redirect")::redirect("register");
            }

            $stmt = $pdo->prepare("SELECT username FROM user WHERE username = :username");
            $stmt->execute([
                'username' => $username
            ]);
            $userm = $stmt->fetch(PDO::FETCH_ASSOC);
            $user = new User();
            if (isset($userm) && !empty($userm)){
                App::get('flash')->set('message', 'Eixe nom està en ús');
                App::get("redirect")::redirect("register");
            }
            else if($password === $password2){

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


       public function checkLogin(): void
       {
           $username = filter_input(INPUT_POST, 'username');
           $password = filter_input(INPUT_POST, 'password');
           if (!empty($username) && !empty($password)) {
               $userModel = App::getModel(UserModel::class);
               $user = $userModel->findOneBy(["username"=>$username]);
               if (!empty($user)) {
                   if (Security::checkPassword($password, $user->getPassword() )) {
                       $_SESSION["loggedUser"] = $user->getId();
                       App::get('flash')->set("message", "S'ha iniciat sessió");
                       if ($user->getRole() === "ROLE_ADMIN") {
                           App::get(Router::class)->redirect("products");
                       }
                       App::get(Router::class)->redirect("");
                   }
               }
           }
           App::get('flash')->set("message", "No s'ha pogut iniciar sessió");
           App::get(Router::class)->redirect("login");
       }

    public function logout()
    {
        session_unset();
        unset($_SESSION);
        session_destroy();
        App::get(Router::class)->redirect("");
        return $this->response->renderView('auth/login');
    }
}