<html>
<head>
    <?php use App\Entity\Product;
    use App\Entity\Partner;

    require __DIR__ . '/../_partials/head-admin.php' ?>
    <title>ACTIFARMA</title>
</head>
<body class="d-flex flex-column min-vh-100">

<?php require __DIR__ . '/../_partials/header-admin.php' ?>

<?=$content?>

<?php require __DIR__ . '/../_partials/footer-admin.php' ?>
</body>
</html>
