<h3>Name:</h3>
<h6> <?= $product->getName() ?></h6>
<h3>Logo:</h3>
<img alt="logo" style="width: 200px; height: auto" class="img-thumbnail" src="/<?= $productsPath  . $product->getLogo() ?>">
<form action="<?=$router->getUrl("products_destroy") ?>" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="id" value="<?= $product->getId() ?>">
    <div class="form-group text-left">
        <h4>Your partner <?= $product->getName()?> is going to be deleted. Are you sure?</h4>
        <input type="submit" name="userAnswer" value="yes"  class="btn btn-danger btn-lg" />
        <input type="submit" name="userAnswer" value="no"  class="btn btn-info btn-lg" />
    </div>
</form>
