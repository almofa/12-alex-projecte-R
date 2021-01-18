<?php
declare(strict_types=1);

namespace App\Controllers;


use App\Core\Controller;
use App\Core\Exception\ModelException;
use App\Core\Exception\NotFoundException;
use App\Core\Router;
use App\Core\Security;
use App\Entity\Movie;
use App\Exception\UploadedFileException;
use App\Exception\UploadedFileNoFileException;
use App\Model\GenreModel;
use App\Model\MovieModel;
use App\Core\App;
use App\Utils\MyLogger;
use App\Utils\UploadedFile;
use DateTime;
use Exception;
use PDOException;

/**
 * Class MovieController
 * @package App\Controllers
 */
class MovieController extends Controller
{
    /**
     * @return string
     * @throws Exception
     */
    public function index(): string
    {
        if (!Security::isAuthenticatedUser())
            App::get(Router::class)->redirect('login');

        $title = "Movies - Movie FX";
        $errors = [];

        $movieModel = new MovieModel(App::get("DB"));
        $movies = $movieModel->findAll();

        $order = filter_input(INPUT_GET, "order", FILTER_SANITIZE_STRING);

        if (!empty($_GET['order'])) {
            $orderBy = [$_GET["order"] => $_GET["tipo"]];
            try {
                $movies = $movieModel->findAll($orderBy);
            } catch (Exception $e) {
                $errors[] = $e->getMessage();
            }
        }
        $router = App::get(Router::class);
        $message = App::get("flash")::get("message");
        return $this->response->renderView("movies", "default", compact('title', 'movies',
            'movieModel', 'errors', 'router','message'));
    }

    /**
     * @return string
     * @throws ModelException
     */
    public function filter(): string
    {
        // S'executa amb el POST
        $title = "Movies - Movie FX";
        $errors = [];
        $movieModel = null;
        $movies = null;

        $router = App::get(Router::class);

        $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);

        $tipo_busqueda = filter_input(INPUT_POST, "optradio", FILTER_SANITIZE_STRING);

        if (!empty($text)) {
            $movieModel = App::getModel(MovieModel::class);
            if ($tipo_busqueda == "both") {
                $movies = $movieModel->executeQuery("SELECT * FROM movie WHERE title LIKE :text OR tagline LIKE :text",
                    ["text" => "%$text%"]);

            }
            if ($tipo_busqueda == "title") {
                $movies = $movieModel->executeQuery("SELECT * FROM movie WHERE title LIKE :text",
                    ["text" => "%$text%"]);

            }
            if ($tipo_busqueda == "tagline") {
                $movies = $movieModel->executeQuery("SELECT * FROM movie WHERE tagline LIKE :text",
                    ["text" => "%$text%"]);
            }

        } else {
            $error = "Cal introduir una paraula de búsqueda";
        }

        return $this->response->renderView("movies", "default", compact('title', 'movies',
            'movieModel', 'errors', 'router'));
    }

    /**
     * @return string
     * @throws Exception
     */
    public function create(): string
    {
        if (!Security::isAuthenticatedUser())
            App::get(Router::class)->redirect('login');

        $genreModel = new GenreModel(App::get("DB"));
        $genres = $genreModel->findAll(["name" => "ASC"]);

        return $this->response->renderView("movies-create-form", "default", compact("genres"));
    }

    /**
     * @return string
     * @throws Exception
     */
    public function store(): string
    {
        if (!Security::isAuthenticatedUser())
            App::get(Router::class)->redirect('login');

        $errors = [];
        $pdo = App::get("DB");
        $genreModel = new GenreModel($pdo);
        $genres = $genreModel->findAll(["name" => "ASC"]);

        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $overview = filter_input(INPUT_POST, "overview", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $tagline = filter_input(INPUT_POST, "tagline", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $genre_id = filter_input(INPUT_POST, "genre_id", FILTER_VALIDATE_INT);
        $filename = "nofoto.jpg";
        if (empty($title)) {
            $errors[] = "The name is mandatory";
        }
        if (empty($overview)) {
            $errors[] = "The overview is mandatory";
        }

        $releaseDate = DateTime::createFromFormat("Y-m-d", $_POST["release_date"]);
        if (empty($releaseDate)) {
            $errors[] = "The release date is mandatory";
        }

        // If there are errors we don't need to upload the poster.
        if (empty($errors)) {
            try {
                $uploadedFile = new UploadedFile("poster", 2000 * 1024, ["image/jpeg", "image/jpg"]);
                if ($uploadedFile->validate()) {
                    $uploadedFile->save(Movie::POSTER_PATH, uniqid("MOV"));
                    $filename = $uploadedFile->getFileName();
                }
            } catch (Exception $exception) {
                $errors[] = "Error uploading file ($exception)";
            }
        }

        if (empty($errors)) {
            try {
                $movieModel = new MovieModel($pdo);
                $movie = new Movie();

                $movie->setTitle($title);
                $movie->setOverview($overview);
                $movie->setReleaseDate($releaseDate);
                $movie->setTagline($tagline);
                $movie->setPoster($filename);
                $movie->setGenreId($genre_id);

                App::get("flash")->set("message", "S'ha creat correctament");
                App::get("redirect")::redirect("movies");

                $movieModel->saveTransaction($movie);
                App::get(MyLogger::class)->info("S'ha creat una nova pel·lícula");

            } catch (PDOException | ModelException | Exception $e) {
                $errors[] = "Error: " . $e->getMessage();
            }
        }

        if (empty($errors)) {
            App::get(Router::class)->redirect("movies");
        }

        return $this->response->renderView("movies-create", "default", compact(
            "errors", "genres"));
    }

    /**
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function delete(int $id): string
    {
        if (!Security::isAuthenticatedUser())
            App::get(Router::class)->redirect('login');

        $errors = [];
        $movie = null;
        $movieModel = App::getModel(MovieModel::class);

        if (empty($id)) {
            $errors[] = '404 Not Found';
        } else {
            try {
                $movie = $movieModel->find($id);
            } catch (NotFoundException $e) {
                $errors[] = '404 Movie Not Found';
            }
        }

        $router = App::get(Router::class);
        $moviesPath = App::get("config")["posters_path"];

        return $this->response->renderView("movies-delete", "default", compact(
            "errors", "movie", 'moviesPath', 'router'));
    }

    /**
     * @return string
     * @throws ModelException
     * @throws NotFoundException
     */
    public function destroy(): string
    {
        if (!Security::isAuthenticatedUser())
            App::get(Router::class)->redirect('login');

        $errors = [];
        $movieModel = App::getModel(MovieModel::class);
        $movie = null;

        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        if (empty($id)) {
            $errors[] = '404 Not Found';
        } else {
            $movie = $movieModel->find($id);
        }
        $userAnswer = filter_input(INPUT_POST, "userAnswer");
        if ($userAnswer === 'yes') {
            if (empty($errors)) {
                try {
                    $movie = $movieModel->find($id);
                    $result = $movieModel->delete($movie);
                } catch (PDOException $e) {
                    $errors[] = "Error: " . $e->getMessage();
                }
            }
        }
        else
            App::get(Router::class)->redirect('movies');

        if (empty($errors))
            App::get(Router::class)->redirect('movies');
        else
            return $this->response->renderView("movies-destroy", "default",
                compact("errors", "movie"));

        return "";
    }

    /**
     * @param int $id
     * @return string
     * @throws ModelException
     * @throws NotFoundException
     */

    public function edit(int $id): string
    {
        if (!Security::isAuthenticatedUser())
            App::get(Router::class)->redirect('login');

        $isGetMethod = true;
        $errors = [];
        $movieModel = App::getModel(MovieModel::class);
        $movie = null;

        if (empty($id)) {
            $errors[] = '404 Not Found';
        } else {
            $movie = $movieModel->find($id);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $isGetMethod = false;

            $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
            if (empty($id)) {
                $errors[] = "Wrong ID";
            }

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (empty($title)) {
                $errors[] = "The title is mandatory";
            }

            $overview = filter_input(INPUT_POST, "overview", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (empty($overview)) {
                $errors[] = "The overview is mandatory";
            }

            $tagline = filter_input(INPUT_POST, "tagline", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $releaseDate = DateTime::createFromFormat("Y-m-d", $_POST["release_date"]);
            if (empty($releaseDate)) {
                $errors[] = "The release date is mandatory";
            }

            $poster = filter_input(INPUT_POST, "poster");


            if (empty($errors)) {
                //Gestion de la imagen si se ha subido
                try {
                    $image = new UploadedFile('poster', 300000, ['image/jpg', 'image/jpeg']);
                    if ($image->validate()) {
                        $image->save(Movie::POSTER_PATH);
                        $poster = $image->getFileName();
                    }
                    //Al estar editando no nos interesa que se muestre este error ya que puede ser que no suba archivo
                } catch (UploadedFileNoFileException $uploadFileNoFileException) {
                    //$errors[] = $uploadFileNoFileException->getMessage();
                } catch (UploadedFileException $uploadFileException) {
                    $errors[] = $uploadFileException->getMessage();
                }
            }

            if (empty($errors)) {
                try {
                    // Instead of creating a new object we load the current data object.
                    $movie = $movieModel->find($id);

                    //then we set the new values
                    $movie->setTitle($title);
                    $movie->setOverview($overview);
                    $movie->setReleaseDate($releaseDate);
                    $movie->setTagline($tagline);
                    $movie->setPoster($poster);

                    $movieModel->update($movie);

                } catch (PDOException $e) {
                    $errors[] = "Error: " . $e->getMessage();
                }
            }
        }

        return $this->response->renderView("movies-edit", "default", compact("isGetMethod",
            "errors", "movie"));
    }

    /**
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function show(int $id): string
    {
        $errors = [];
        if (!empty($id)) {
            try {
                $movieModel = new MovieModel(App::get("DB"));
                $movie = $movieModel->find($id);
                $title = $movie->getTitle() . " (" . $movie->getReleaseDate()->format("Y") . ") - Movie FX";
                return $this->response->renderView("single-page", "default", compact(
                    "errors", "movie"));

            } catch (NotFoundException $notFoundException) {
                $errors[] = $notFoundException->getMessage();
            }
       }
        else
            return $this->response->renderView("single-page", "default", compact(
                "errors"));

        return "";
    }
}