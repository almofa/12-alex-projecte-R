<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Delete partner</h1>

            <?php if (!empty($errors)) : ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <?php require __DIR__ . '/partners/form-delete.view.php' ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.row -->
</div>
