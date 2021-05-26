<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Edit product</h1>
            <?php if (!empty($errors)){ ?>
                <ul>
                    <?php foreach ($errors as $error){?>
                        <li><?= $error ?></li>
                    <?php}?>
                </ul>
                <?php require 'views/products/form-edit.view.php'; ?>
            <?php }else{ ?>
                <h2>The product has been updated successfully!</h2>
            <?php } ?>

        </div>
        <div class="col-4"></div>
    </div>
    <!-- /.row -->
</div>