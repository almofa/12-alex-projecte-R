<div class="container">
    <h1>Formulari de contacte</h1>
    <?php if ($_SERVER['REQUEST_METHOD']==='POST' && empty($errors)) {?>
        <h2>Missatge enviat</h2>
        <p><b>Nom:</b> <?=$name ?></p>
        <p><b>Email:</b> <?=$email ?></p>
        <p><b>Data de naixement:</b> <?=$date->format("Y-m-d") ?></p>
        <p><b>Assumpte:</b> <?=$subject ?></p>
        <p><b>Missatge:</b> <?=$message ?></p>
    <?php }else {?>

        <?php if (!empty($errors)) {?>
            <h2 style="color: red">Hi ha errors en processar el formulari</h2>
            <ul>
                <?php foreach ($errors as $error) {?>
                    <li style="color: red"><?=$error?></li>
                <?php }?>
            </ul>
        <?php } ?>
        <form action="/contact" method="post" class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nom i cognom:</label>
                    <input class="form-control" type="text" name="name">

                </div>

                <div class="form-group">
                    <label>Data naixement:</label>
                    <input class="form-control" type="date" name="date">

                </div>

                <div class="form-group">
                    <label for="email">Correu electronic:</label>
                    <input  id="email" class="form-control" type="email" name="email">

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input  id="subject" class="form-control" type="text" name="subject">

                </div>
                <div class="form-group">
                    <label>Missatge:</label>
                    <textarea  class="form-control" type="text" name="message"></textarea>

                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="Send message">
                </div>
            </div>
        </form>
    <?php } ?>
</div>
