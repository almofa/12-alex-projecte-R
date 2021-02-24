<form action="" method="post" enctype="multipart/form-data" novalidate>
    <div class="form-group">
        <label for="name">Name:</label>
        <input id="name" class="form-control" type="text" name="name" required>
    </div>
    <div class="form-group">
        <label for="logo">Logo:</label>
        <input id="logo" class="form-control-file" type="file" name="logo" required>
    </div>
    <div class="form-group">
        <label for="preu">Preu:</label>
        <input id="preu" class="form-control" type="text" name="preu" required>
    </div>
    <div class="form-group">
        <label for="tipus">Tipus:</label>
        <select id="tipus" name="tipus" class="form-control" required>
            <?php foreach ($tipus as $tipo):?>
            <option id="<?=$tipo->getId() ?>" value="<?=$tipo->getId() ?>"><?=$tipo->getNom() ?></option>
            <?php endforeach;  ?>
        </select>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
