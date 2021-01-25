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
                <?php require 'views/partners/form-delete.view.php' ?>
            <?php else: ?>
                <h2>The partner <?= $partner->getName() ?> has been deleted successfully!</h2>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.row -->
</div>
