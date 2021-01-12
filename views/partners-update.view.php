<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Edit partner</h1>
            <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <? endforeach; ?>
                </ul>
                <?php require 'views/partners/form-edit.view.php'; ?>
            <?php else: ?>
                <h2>The partner has been updated successfully!</h2>
            <? endif ?>

        </div>
        <div class="col-4"></div>
    </div>
    <!-- /.row -->
</div>

