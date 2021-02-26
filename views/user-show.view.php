
<?php

use App\Entity\User;

?>

<div class="container">
    <h1>Perfil Usuari</h1>

            <input type="hidden" name="id" value="<?= $usuario->getId() ?>">
            <h2><strong>Nom:</strong> <?= $usuario->getUsername()?></h2>

            <div class="col-12">
                <a href="/perfil/<?= $usuario->getId() ?>/editpass"><button class="btn bg-secondary"><i class="fa fa-edit mr-1"></i>Cambiar Contrasenya</button></a>

            </div>
</div>

