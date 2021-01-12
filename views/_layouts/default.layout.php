<!DOCTYPE html>
<html lang="en">
<head>
    <?php use App\Entity\Movie;
    use App\Entity\Partner;

    require __DIR__ . '/../_partials/head.partial.php' ?>
    <title>"Movie FX"</title>
</head>
<body class="d-flex flex-column min-vh-100">
<header>
    <?php require __DIR__ . '/../_partials/header.partial.php' ?>
</header>
<main class="mt-2 flex-fill">
<?=$content?>
</main>
<?php require __DIR__ . '/../_partials/footer.partial.php' ?>
</body>
</html>