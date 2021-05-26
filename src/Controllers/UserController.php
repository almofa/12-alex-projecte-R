<?php


namespace App\Controllers;


use App\Core\App;
use App\Core\Controller;
use App\Core\Router;
use App\Core\Security;
use App\Database;
use App\Entity\Product;
use App\Entity\User;
use App\Exception\UploadedFileException;
use App\Exception\UploadedFileNoFileException;
use App\Model\PartnerModel;
use App\Model\ProductModel;
use App\Model\TipusModel;
use App\Model\UserModel;
use App\Utils\UploadedFile;
use Exception;
use PDO;
use PDOException;


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

    public function show(): string
    {
        $usuario = App::get("user");

        $router = App::get(Router::class);

        return $this->response->renderView("user-show", "default", compact( 'usuario', 'router' ));
    }

    public function edit(int $id): string
    {
        $isGetMethod = true;
        $errors = [];
        $userModel = App::getModel(UserModel::class);
        $usuario = null;

        if (empty($id)) {
            $errors[] = '404';
        } else {
            $usuario = $userModel->find($id);

        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $isGetMethod = false;

            $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
            if (empty($id)) {
                $errors[] = "ID Erroni";
            }

            $password = filter_input(INPUT_POST, "password");
            $repitePassword = filter_input(INPUT_POST, "repitePassword");

            if (empty($password)) {
                $errors[] = "password es obligtori";
            }

            if(empty($repitePassword)){

                $errors[] = "Deus repetir  password";
            }

            if($repitePassword !== $password){

                $errors[] = "Deus introduïr el mateix password";
            }


            if (empty($errors)) {
                try {
                    // Instead of creating a new object we load the current data object.
                    $usuario = $userModel->find($id);
                    $passwordencode = Security::encode($password);
                    //then we set the new values
                    $usuario->setPassword($passwordencode);

                    $usuario = $userModel->update($usuario);

                } catch (PDOException $e) {
                    $errors[] = "Error: " . $e->getMessage();
                }
            }
        }

        return $this->response->renderView("users-edit", "default", compact(
            "errors", "isGetMethod", "usuario"));
    }
/*aplicar els canvis*/
    public function update(int $id): string
    {

        $errors = [];
        $isGetMethod = false;
        $password = filter_input(INPUT_POST, "password");
        $repitePassword = filter_input(INPUT_POST, "repitePassword");

        if (empty($password)) {
            $errors[] = "El password es obligtorio";
        }

        if(empty($repitePassword)){

            $errors[] = "Debe repetir el password";
        }

        if($repitePassword !== $password){

            $errors[] = "Debe introcir el mismo password";
        }



        if (empty($errors)) {

            try {

                $usuarioModel = App::getModel(UserModel::class);
                // Instead of creating a new object we load the current data object.
                $usuario = $usuarioModel->find($id);
                $passwordencode = Security::encode($password);
                //then we set the new values
                $usuario->setPassword($passwordencode);

                // updating changes
                $usuarioModel->update($usuario);
            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("user-show", "default", compact(
            "errors", "isGetMethod", "usuario"));
    }

    public function editar(int $id): string
    {
        // 1. Get connection
        $pdo = Database::getConnection();
        // 2. Prepare query
        $stmt = $pdo->prepare('SELECT * FROM user WHERE id=:id');

        // 3. Assign parameters values
        $stmt->bindValue("id", $id, PDO::PARAM_INT);

        // 4. Execute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);

        // 5. Get result
        $user = $stmt->fetch();
        $router = App::get(Router::class);

        return $this->response->renderView("users-editar", "admin", compact('user',  'router'));

    }

    public function updated(int $id): string
    {
        $errors = [];

        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        if (empty($id)) {
            $errors[] = "Wrong ID";
        }
        $username = filter_input(INPUT_POST, "username");
        if(empty($tipus)){
            $errors[] = "Tipus is mandatory";
        }
        $role = filter_input(INPUT_POST, "role");
        if(empty($tipus)){
            $errors[] = "Tipus is mandatory";
        }

        // if there are errors we don't upload image file

        if (empty($errors)) {
            try {
                $userModel = App::getModel(UserModel::class);
                // getting the partner by its identifier
                $user = $userModel->find($id);
                $user->setUsername($username);
                $user->setRole($role);
                // updating changes
                $userModel->update($user);
            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("users-updated", "admin" );
    }



}