<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>New movie</h1>
            <?php if (!empty($errors)) : ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php require __DIR__ . '/movies/form-create.view.php' ?>
            <?php else: ?>
                <h2>The movie has been inserted successfully!</h2>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.row -->
</div>