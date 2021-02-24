<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Productes</h1>

    </div>
    <div class="row p-2">
        <div class="col-md-3 col-lg-3 col-sm-12 col-12 p-1">
                <select id="tipus" name="tipus" class="form-control" required>
                    <?php foreach ($tipus as $tipo):?>
                        <option id="<?=$tipo->getId() ?>"><?=$tipo->getNom() ?></option>
                    <?php endforeach;  ?>
                </select>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-lg-7 col-md-7 p-1">
            <div class="input-group mb-3">
                <form method="post" action="<?=$router->getUrl("products_filter")?>">
                <input name="text" type="text" class="form-control" placeholder="Buscar.." value="<?= ($_POST["text"]) ?? "" ?>" aria-label="Buscar" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="text-white fas fa-search"></i></button>

            </div>
                </form>
                </div>
            </div>

        </div>
        <div class="col-12 col-sm-12 col-lg-2 col-md-2 p-1">
            <a href="products/create" ><button class="btn btn-primary">Nou Partner</button></a>
        </div>
<div class="row p-3">
    <? if (empty($products)) : ?>
        <h3>No s'ha trobat cap element</h3>
    <? else: ?>
        <table class="table table-striped shadow " >
            <tr>
                <th class="text-center">Nom</th>
                <th class="text-center">Image</th>
                <th class="text-center">Preu</th>
                <th class="text-center">Accions</th>
            </tr>

            <?php foreach ($products as $product) : ?>
                <tr>
                    <td class="text-center"><?= $product->getName() ?></td>
                    <td class="text-center"><img alt="logo" style="width: 150px; height: auto" class="img-thumbnail" src="<?= $productsPath . $product->getLogo() ?>"></td>
                    <td class="text-center"><?= $product->getPreu() ?>Є</td>
                    <td class="text-center">
                        <a class="btn btn-primary" href="<?=$router->getUrl("products_edit", ["id"=>$product->getId()])?>">
                            <i class="fa fa-edit"></i> Edita</a>
                        <a class="btn btn-warning" href="<?=$router->getUrl("products_delete", ["id"=>$product->getId()])?>">
                            <i class="fa fa-remove"></i>Esborrar</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>
    <? endif; ?>



</div>



