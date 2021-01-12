<?php use App\Entity\Movie;
    use App\Entity\Partner;
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <h2 class="my-4">Genres</h2>
            <div class="list-group">
                <?php foreach ($genres as $genre) :?>
                    <a href="genre-page.php?id=<?=$genre->getId();?>" class="list-group-item"><?=$genre->getName()?>
                        (<?=$genre->getNumberOfMovies()?>)
                    </a>
                <?php endforeach;?>
            </div>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item">
                        <img class="d-block  img-fluid" src="images/banners/banner01.jpg" alt="First slide" width="900"
                             height="350">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block  img-fluid" src="images/banners/banner02.jpg" alt="Second slide" width="900"
                             height="350">
                    </div>
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="images/banners/banner03.jpg" alt="Third slide" width="900"
                             height="350">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="images/banners/banner04.jpg" alt="Fourth slide" width="900"
                             height="350">
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
            <div class="row">
                <div class="col-12">
                    <form class="form-inline  justify-content-center my-4">
                        <input class="form-control w-75 mr-sm-4" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <h2>What's new!</h2>
            <div class="row">
                <?php foreach ($movies as $movie): ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="<?=$router->getUrl("movies_show", ["id"=>$movie->getId(), "proves"=>"2"])?>"><?= generar_imagen_local(Movie::POSTER_PATH.'/', $movie->getPoster(),
                                    $movie->getTitle(), "card-img-top", 250, 50) ?></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?=$router->getUrl("movies_show", ["id"=>$movie->getId()])?>"><?= $movie->getTitle() ?></a>
                                </h4>
                                <p class="card-text"><em><?= $movie->getTagline() ?></em></p>
                                <p class="card-text text-muted"><?= $movie->getReleaseDate()->format("d-M-Y") ?></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">★ ★ ★ ★ ☆</small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
    </div>
    <section id="partner">
        <div class="container">
            <div class="row pb-4">
                <div class="col-md-12">
                    <h2>Our Partners</h2>
                    <div class="row">
                        <?php
                        foreach ($partners as $partner): ?>
                            <div class="col-3"><?= generar_imagen_local($partnersPath , $partner->getLogo(),
                                    $partner->getName(), "w-50") ?></div>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </section>
</div>
