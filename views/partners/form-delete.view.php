
<h3>Name:</h3>
<h6> <?= $partner->getName() ?></h6>
<h3>Logo:</h3>
<?= generar_imagen_local( $partnersPath. '/', $partner->getLogo()) ?>
<form action="<?=$router->getUrl("partners_destroy") ?>" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="id" value="<?= $partner->getId() ?>">
    <div class="form-group text-left">
        <h4>Your partner <?= $partner->getName()?> is going to be deleted. Are you sure?>?</h4>
        <input type="submit" name="userAnswer" value="yes"  class="btn btn-danger btn-lg" />
        <input type="submit" name="userAnswer" value="no"  class="btn btn-info btn-lg" />
    </div>
</form>


