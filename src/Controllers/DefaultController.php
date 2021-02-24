<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;
use App\Core\Router;
use App\Entity\Product;
use App\Entity\Tipus;
use App\Model\GenreModel;
use App\Model\MovieModel;
use App\Model\PartnerModel;
use App\Model\ProductModel;
use App\Model\TipusModel;
use App\Utils\MyMail;
use DateTime;
use Exception;
use PDOException;
use App\Entity\Movie;


/**
 * Class DefaultController
 * @package App\Controllers
 */
class DefaultController extends Controller
{
    /**
     * @return string
     * @throws Exception
     */
    public function index(): string
    {
        try {
            $productModel = App::getModel(ProductModel::class);
            $products = $productModel->findAll();

            $partnerModel = App::getModel(PartnerModel::class);
            $partners = $partnerModel->findAll();

            $tipusModel = App::getModel(TipusModel::class);
            $tipus = $tipusModel->findAll(["nom" => "ASC"]);


            shuffle($partners);
            $partners = array_slice($partners, 0, 4);
            $title = "Movie FX";

            $router = App::get(Router::class);

            $partnersPath = App::get("config")["partners_path"];

            return $this->response->renderView("index", "default", compact('title', 'partners',
                'products', 'tipus', 'router', 'partnersPath'));

        } catch (PDOException $PDOException) {
            return $PDOException->getMessage();
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

    }

    public function sobre(): string
    {
        try {
            $productModel = App::getModel(ProductModel::class);
            $products = $productModel->findAll();

            $partnerModel = App::getModel(PartnerModel::class);
            $partners = $partnerModel->findAll();

            $tipusModel = App::getModel(TipusModel::class);
            $tipus = $tipusModel->findAll(["nom" => "ASC"]);


            shuffle($partners);
            $partners = array_slice($partners, 0, 4);


            $router = App::get(Router::class);

            $partnersPath = App::get("config")["partners_path"];

            return $this->response->renderView("sobre", "default", compact( 'partners',
                'products', 'tipus', 'router', 'partnersPath'));

        } catch (PDOException $PDOException) {
            return $PDOException->getMessage();
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

    }

    public function users(): string
    {
        try {
            $productModel = App::getModel(ProductModel::class);
            $products = $productModel->findAll();

            $partnerModel = App::getModel(PartnerModel::class);
            $partners = $partnerModel->findAll();

            $tipusModel = App::getModel(TipusModel::class);
            $tipus = $tipusModel->findAll(["nom" => "ASC"]);


            shuffle($partners);
            $partners = array_slice($partners, 0, 4);


            $router = App::get(Router::class);

            $partnersPath = App::get("config")["partners_path"];

            return $this->response->renderView("users", "default", compact( 'partners',
                'products', 'tipus', 'router', 'partnersPath'));

        } catch (PDOException $PDOException) {
            return $PDOException->getMessage();
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

    }

    public function local(): string
    {
        try {
            $productModel = App::getModel(ProductModel::class);
            $products = $productModel->findAll();

            $partnerModel = App::getModel(PartnerModel::class);
            $partners = $partnerModel->findAll();

            $tipusModel = App::getModel(TipusModel::class);
            $tipus = $tipusModel->findAll(["nom" => "ASC"]);


            shuffle($partners);
            $partners = array_slice($partners, 0, 4);


            $router = App::get(Router::class);

            $partnersPath = App::get("config")["partners_path"];

            return $this->response->renderView("localitzacio", "default", compact( 'partners',
                'products', 'tipus', 'router', 'partnersPath'));

        } catch (PDOException $PDOException) {
            return $PDOException->getMessage();
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

    }

    public function preguntes(): string
    {
        try {
            $productModel = App::getModel(ProductModel::class);
            $products = $productModel->findAll();

            $partnerModel = App::getModel(PartnerModel::class);
            $partners = $partnerModel->findAll();

            $tipusModel = App::getModel(TipusModel::class);
            $tipus = $tipusModel->findAll(["nom" => "ASC"]);


            shuffle($partners);
            $partners = array_slice($partners, 0, 4);


            $router = App::get(Router::class);

            $partnersPath = App::get("config")["partners_path"];

            return $this->response->renderView("pregfrequents", "default", compact( 'partners',
                'products', 'tipus', 'router', 'partnersPath'));

        } catch (PDOException $PDOException) {
            return $PDOException->getMessage();
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

    }

    public function tenda(): string
    {
        try {
            $productModel = App::getModel(ProductModel::class);
            $products = $productModel->findAll();

            $partnerModel = App::getModel(PartnerModel::class);
            $partners = $partnerModel->findAll();

            $tipusModel = App::getModel(TipusModel::class);
            $tipus = $tipusModel->findAll(["nom" => "ASC"]);


            shuffle($partners);
            $partners = array_slice($partners, 0, 4);


            $router = App::get(Router::class);

            $partnersPath = App::get("config")["partners_path"];

            return $this->response->renderView("tenda", "default", compact( 'partners',
                'products', 'tipus', 'router', 'partnersPath'));

        } catch (PDOException $PDOException) {
            return $PDOException->getMessage();
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

    }



    /**
     * @return string
     * @throws Exception
     */
    public function contact(): string
    {
        // 2. S'ha enviat el formulari
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 3. Validar
            $name = filter_input(INPUT_POST, "name");
            $subject = filter_input(INPUT_POST, "subject");
            $message = filter_input(INPUT_POST, "message");
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $date = DateTime::createFromFormat("Y-m-d", filter_input(INPUT_POST, "date"));

            if (empty($name)) {
                $errors[] = "No has posat el nom i cognom";
            }

            if (empty($date)) {
                $errors[] = "No has posat la data";
            }

            if (empty($email)) {
                $errors[] = "No has posat el correu o és incorrecte";
            }

            if (empty($subject)) {
                $errors[] = "No has posat l'assumpte";
            }

            if (empty($message)) {
                $errors[] = "No has posat el missatge";
            }

            if (empty($errors)) {
                $fullMessage = "$name ($email)\n $subject\n $message";
                App::get(MyMail::class)->send("contact form", "vjorda.pego@gmail.com", "Vicent", $fullMessage);
            }

            return $this->response->renderView("contact", "default", compact('errors',
                'name', 'date', 'subject', 'message', 'email'));
        } else
            return $this->response->renderView("contact", "default");

    }

    /**
     * @return string
     * @throws \App\Core\Exception\ModelException
     */
    public function demo(): string
    {
        $movieModel = App::getModel(MovieModel::class);
        $movies = $movieModel->findAllPaginated(1, 8,
            ["release_date" => "DESC", "title" => "ASC"]);
        return $this->response->jsonResponse($movies);

    }
}