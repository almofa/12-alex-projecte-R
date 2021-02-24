<form action="<?= $router->getUrl("products_update", ["id"=>$product->getId()]); ?>" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="id" value="<?=$product->getId()?>">
    <div class="form-group">
        <label for="name">Name:</label>
        <input id="name" class="form-control" type="text" name="name"
               value="<?=$product->getName()?>" required>
    </div>
    <div class="form-group">
        <label for="logo">Logo:</label>
        <input type="hidden" name="logo"
               value="<?=$product->getLogo()?>">
        <input id="logo" class="form-control-file" type="file" name="logo"
               value="<?=$product->getLogo()?>" required >
        <small><?=$product->getLogo()?></small>
    </div>
    <div class="form-group">
        <label for="tipus">Tipus:</label>
        <select id="tipus" name="tipus" class="form-control" required>
            <option selected disabled value="Tria un">-- Tria un tipus --</option>
            <?php foreach ($tipus as $tipo):?>
                <option id="<?=$tipo->getId() ?>" value="<?=$tipo->getId() ?>"><?=$tipo->getNom() ?></option>
            <?php endforeach;  ?>
        </select>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
