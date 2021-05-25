

<?php if (!empty($message)){?>
    <div class="alert alert-secondary alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?=$message ?>
    </div>

<?php } ?>
<form action="" novalidate method="post">

        <h1>Registra't</h1>
        <p>Perfavor emplena els camps perquè pugues crear el teu usuari.</p>
        <hr><br>
    <div class="form-group">
        <label for="email"><b>Nom d'usuari</b></label>
        <input type="text" placeholder="Enter Username" name="user" id="user" required>
    </div>

    <div class="form-group">
        <label for="email"><b>Contrasenya</b></label>
        <input type="text" placeholder="Enter Password" name="password" id="password" required>
    </div>

    <div class="form-group">
        <label for="email"><b>Repetix la contrasenya</b></label>
        <input type="text" placeholder="Repeat Password" name="password2" id="repeat-pssw" required>
    </div>

        <input type="submit" class="btn btn-primary"></input>
</form>
</div>


