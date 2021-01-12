<div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
            <h1>New partner</h1>
            <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <? endforeach; ?>
                </ul>
                <?php require __DIR__ . '/partners/form-create.view.php'; ?>
            <?php else: ?>
                <h2>The partner has been inserted successfully!</h2>
            <? endif ?>
        </div>
    </div>
    <!-- /.row -->
</div>