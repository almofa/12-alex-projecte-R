<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Edit movies</h1>
            <?php if (!empty($errors) || ($isGetMethod)) : ?>
                <?php if (!empty($errors)) : ?>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php require __DIR__ . '/movies/form-edit.view.php' ?>
            <?php else: ?>
                <h2>The movies has been updated successfully!</h2>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.row -->
</div>