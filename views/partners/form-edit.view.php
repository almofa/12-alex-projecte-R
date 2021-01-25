<form action="<?= $router->getUrl("partners_update", ["id"=>$partner->getId()]); ?>" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="id" value="<?=$partner->getId()?>">
    <div class="form-group">
        <label for="name">Name:</label>
        <input id="name" class="form-control" type="text" name="name"
               value="<?=$partner->getName()?>" required>
    </div>
    <div class="form-group">
        <label for="logo">Logo:</label>
        <input type="hidden" name="logo"
               value="<?=$partner->getLogo()?>">
        <input id="logo" class="form-control-file" type="file" name="logo"
               value="<?=$partner->getLogo()?>" required >
        <small><?=$partner->getLogo()?></small>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

