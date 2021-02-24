<?php


namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;
use App\Core\Router;
use App\Database;
use App\Entity\Product;
use App\Exception\UploadedFileException;
use App\Exception\UploadedFileNoFileException;
use App\Model\ProductModel;
use App\Model\TipusModel;
use App\Utils\MyLogger;
use App\Utils\UploadedFile;
use Exception;
use PDO;


class ProductController extends Controller
{


    function index(): string
    {
        $tipusModel = App::getModel(TipusModel::class);
        $tipus = $tipusModel->findAll();

        $productsModel = App::getModel(ProductModel::class);
        $router = App::get(Router::class);
        $productsPath = App::get("config")["products_path"];
        $products = $productsModel->findAll(["name" => "ASC"]);
        $message = App::get("flash")::get("message");
        return $this->response->renderView("products", "admin",
            compact('products', 'tipus', 'router', 'productsPath','message'));
    }

    function filter(): string
    {
        $productModel = App::getModel(ProductModel::class);
        $router = App::get(Router::class);
        $productsPath = App::get("config")["products_path"];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);
            if (!empty($text)) {
                $products = $productModel->executeQuery("SELECT * FROM producte WHERE name LIKE :text",
                    ["text" => "%$text%"]);
            } else
                $error = "Cal introduir una paraula de búsqueda";
        } else {
            $products = $productModel->findAll();
        }
        return $this->response->renderView("products", "admin",
            compact( 'products', 'router', 'productsPath'));
    }

    /**
     * Shows the creation form
     * @throws Exception
     */
    public function create(): string
    {
        $tipusModel = App::getModel(TipusModel::class);
        $router = App::get(Router::class);
        $tipus = $tipusModel->findAll();

        $title = "New product - Actifarma";
        return $this->response->renderView("products-create", "admin", compact('title', 'tipus'));
    }

    public function store(): string
    {
        $errors = [];
        $title = "New Product";
        $filename = "nofoto.jpg";

        $name = filter_input(INPUT_POST, "name");
        if (empty($name)) {
            $errors[] = "The name is mandatory";
        }

        $preu = filter_input(INPUT_POST, "preu", FILTER_VALIDATE_INT);
        if (empty($preu)) {
            $errors[] = "The price is mandatory";
        }

        $tipus = filter_input(INPUT_POST, "tipus", );
        if (empty($tipus)) {
            $errors[] = "The tipus is mandatory";
        }

        // if there are errors we don't upload image file
        if (empty($errors)) {
            try {
                $uploadedFile = new UploadedFile("logo", "300000");
                if ($uploadedFile->validate()) {
                    // we get the path form config file
                    $directory = App::get("config")["products_path"];
                    // we use uniqid to generate a uniqid filename;
                    $uploadedFile->save($directory, uniqid("PTN"));
                    // we get the generated name to save it in the db
                    $filename = $uploadedFile->getFileName();


                }
            } catch (UploadedFileNoFileException $uploadedFileNoFileException) {
                $errors[] = $uploadedFileNoFileException->getMessage();
            } catch (UploadedFileException | Exception $uploadedFileException ) {
                $errors[] = $uploadedFileException->getMessage();
                App::get(MyLogger::class)->error($uploadedFileException->getMessage());
            }
        }
        if (empty($errors)) {
            try {
                $product = new Product();
                $product->setName($name);
                $product->setLogo($filename);
                $product->setPreu($preu);
                $product->setTipusId($tipus);

                $productModel = App::getModel(ProductModel::class);
                $productModel->save($product);

                App::get("flash")->set("message", "S'ha creat correctament");
                App::get("redirect")::redirect("products");

            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("products-store", "admin", compact('errors', 'title'));
    }

    public function delete(int $id): string
    {
        $errors = [];
        $productModel = App::getModel(ProductModel::class);
        $title = "Product delete - Movie FX";
        $product = $productModel->find($id);
        $router = App::get(Router::class);
        $productsPath = App::get("config")["products_path"];

        return $this->response->renderView("products-delete", "admin",
            compact('title', 'product', 'errors', 'router', 'productsPath'));
    }


    public function destroy(): string
    {
        $errors = [];
        $title = "Partner delete - Movie FX";
        $userAnswer = filter_input(INPUT_POST, "userAnswer");
        $router = App::get(Router::class);
        $productsPath = App::get("config")["products_path"];
        $partner = null;

        if (!empty($userAnswer) && $userAnswer == "yes") {
            $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
            $productModel = App::getModel(ProductModel::class);
            $product = $productModel ->find($id);
            if (!$productModel->delete($product))
                $errors[] = "There were errors deleting entity";
        }
        else {
            $router->redirect('products');
        }

        $router->redirect('products');
        return $this->response->renderView("products-destroy", "admin",
            compact('title', 'product', 'errors', 'router', 'productsPath'));
    }

    /**
     * Shows the edit form
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function edit(int $id): string
    {
        $tipusModel = App::getModel(TipusModel::class);
        $tipus = $tipusModel->findAll();

        $title = "Edit product - Movie FX";
        // 1. Get connection
        $pdo = Database::getConnection();

        // 2. Prepare query
        $stmt = $pdo->prepare('SELECT * FROM producte WHERE id=:id');

        // 3. Assign parameters values
        $stmt->bindValue("id", $id, PDO::PARAM_INT);

        // 4. Execute query
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Product::class);

        // 5. Get result
        $product = $stmt->fetch();
        $router = App::get(Router::class);

        return $this->response->renderView("products-edit", "admin", compact('title',
            'product', "tipus", 'router'));

    }

    public function update(int $id): string
    {
        $errors = [];

        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        if (empty($id)) {
            $errors[] = "Wrong ID";
        }

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($name)) {
            $errors[] = "The name is mandatory";
        }

        $tipus = filter_input(INPUT_POST, "tipus");
        if(empty($tipus)){
            $errors[] = "Tipus is mandatory";
        }

        $filename = filter_input(INPUT_POST, "logo");

        // if there are errors we don't upload image file
        if (empty($errors)) {
            try {
                $uploadedFile = new UploadedFile("logo");
                if ($uploadedFile->validate()) {
                    // we get the path form config file
                    $directory = App::get("config")["products_path"];
                    // we use uniqid to generate a uniqid filename;
                    $uploadedFile->save($directory, uniqid("PTN"));
                    // we get the generated name to save it in the db
                    $filename = $uploadedFile->getFileName();
                }
            } catch (UploadedFileNoFileException $uploadedFileNoFileException) {
                // When updating is possible not to upload a file
            } catch (UploadedFileException $uploadedFileException) {
                $errors[] = $uploadedFileException->getMessage();
            }
        }

        if (empty($errors)) {
            try {
                $productModel = App::getModel(ProductModel::class);
                // getting the partner by its identifier
                $product = $productModel->find($id);
                $product->setName($name);
                $product->setLogo($filename);
                $product->setTipusId($tipus);
                // updating changes
                $productModel->update($product);
            } catch (Exception $e) {
                $errors[] = 'Error: ' . $e->getMessage();
            }
        }
        return $this->response->renderView("products-update", "admin" );
    }
}