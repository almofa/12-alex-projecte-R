<div class="container">

            <h1>New product</h1>
            <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <? endforeach; ?>
                </ul>
                <?php require __DIR__ . '/products/form-create.view.php'; ?>
            <?php else: ?>
                <h2>The product has been inserted successfully!</h2>
            <? endif ?>
        </div>

