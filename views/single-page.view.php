<div class="container-fluid">
    <div class="row">
        <?php use App\Entity\Product;

        if (empty($errors)) : ?>
            <div class="col-4">
                <img src="/images/products/<?=$product->getLogo()?>">
            </div>
            <div class="col-8 ">
                <h1 style="margin-bottom: 0!important;"><?= $product->getName() ?></h1>
                <hr>
                <h2 style=" padding: 2rem"><em style="color: #1e7e34;"> <?= $product->getPreu() ?>€</em></h2>
            </div>
        <?php else :?>
            <? foreach ($errors as $error) ?>
                <h3><?= $error ?></h3>

        <?php endif ?>
    </div> <!-- /.row -->
</div> <!-- /.container -->
