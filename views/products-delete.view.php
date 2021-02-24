<div class="container">

            <h1>Delete product</h1>

            <?php if (!empty($errors)) : ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <?php require __DIR__ . '/products/form-delete.view.php' ?>
            <?php endif; ?>

    <!-- /.row -->
</div>
