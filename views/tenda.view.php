<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $product_id = filter_input(INPUT_POST, "id");
    var_dump($product_id);
} ?>

<div class="container-fluid maintenda">
    <div class="row primeratenda">
        <div class="col-3 hamburguesa">
            <nav>
                <input type="checkbox" id="menu">
                <label for="menu"><span id="hambuerguer">☰</span>&nbsp;CATEGORIES&nbsp;&#11167;</label>
                <ul>
                    <li><a href="#">Higiene</a></li>
                    <li><a href="#">Cosmètica</a></li>
                    <li><a href="#">Salut</a></li>

                </ul>
            </nav>
        </div>
        <div class="col-9 buscadortenda">
            <form class="searchinput" action="">
                <input  novalidate type="search" name="buscador" id="buscadorprinc" size="51">
                <button type="submit">Buscar en Tenda</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid maintenda2">
    <div class="row filatitoltenda">
        <div class="col-12 titolstenda">
            <h2>PRODUCTES





            </h2>
        </div>
    </div>
    <div class="row filatitoltenda">
        <form action="carrito" method="post">
        <?php foreach ($products as $product):?>
        <div class="col-3 contenedorprod">
            <div class=" product">
                <div class="imageprodtenda">
                    <img src="images/products/<?=$product->getLogo()?>" alt="">
                </div>
                <div class="textproducte">
                    <p><a href="<?=$router->getUrl("products_show", ["id"=>$product->getId()])?>"><?= $product->getName() ?></a></p>
                    <p class="preu"> <?=$product->getPreu()?> €</p>
                    <input type="hidden" name="id" value="<?=$product->getId()?>">
             <button type="submit" class="comprar">Afegir al carret</button>
                </div>
            </div>
        </div>
        </form>
        <?php endforeach;?>
        <nav class="d-flex justify-content-center" aria-label="Page navigation">
            <ul  class="pagination">
                <?php for( $i = 1 ; $i <= $total_pages ; $i++): ?>
                <li style="border: none; padding: 0" class="page-item"><a class="page-link" href="http://12-alex-projecte.local/tenda?page=<?= $i ?>"><?=$i?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>

        </div>
                </div>

