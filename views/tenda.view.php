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
        <?php foreach ($products as $product):?>
        <div class="col-3 contenedorprod">
            <div class=" product">
                <div class="imageprodtenda">
                    <img src="images/products/<?=$product->getLogo()?>" alt="">
                </div>
                <div class="textproducte">
                    <p><a href="<?=$router->getUrl("products_show", ["id"=>$product->getId()])?>"><?= $product->getName() ?></a></p>
                    <p class="preu"> <?=$product->getPreu()?> €</p>
                    <button class="comprar">COMPRAR</button>

                </div>
            </div>
        </div>
        <?php endforeach;?>

        </div>
                </div>

