<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6 my-4">
            <?= generar_imagen_local("/".$moviesPath, $movie->getPoster(),
                $movie->getTitle() , "rounded w-100") ?>
        </div>
        <div class="col-lg-9 col-md-6 my-5">
            <h1><?= $movie->getTitle() ?></h1>
            <p class="text-muted"><?= $movie->getReleaseDate()->format("d-M-Y") ?> · Action</p>
            <h2><em><?= $movie->getTagline() ?>.</em></h2>
            <h5 class="text-muted">Overview</h5>
            <p><?= $movie->getOverview() ?></p>
            <p class="text-muted">★ ★ ★ ★ ☆</p>
        </div>
    </div> <!-- /.row -->
</div> <!-- /.container -->
<form action="<?=$router->getUrl("movies_destroy") ?>" method="post" novalidate>
    <input type="hidden" name="id" value="<?= $movie->getId() ?>">
    <div class="form-group text-left">
        <h4>¿Estas seguro que quieres borrar la pelicula " <?= $movie->getTitle() ?> "?</h4>
        <button type="submit" name="userAnswer" value="yes" class="btn btn-danger btn-lg">Yes</button>
        <button type="submit" name="userAnswer" value="no" class="btn btn-info btn-lg">No</button>
    </div>
</form>
<br><br>


