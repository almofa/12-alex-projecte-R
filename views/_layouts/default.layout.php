<!DOCTYPE html>
<html>
<head>
    <?php use App\Entity\Movie;
    use App\Entity\Partner;

    require __DIR__ . '/../_partials/head.php' ?>
    <title>ACTIFARMA</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require __DIR__ . '/../_partials/header.php' ?>

<?=$content?>

<?php require __DIR__ . '/../_partials/footer.php' ?>
</body>
</html>