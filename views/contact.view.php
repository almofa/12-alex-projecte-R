<div class="container">
    <h1>Formulari de contacte </h1>
    <? if ($_SERVER['REQUEST_METHOD']==='POST' && empty($errors)) :?>
    <h2>Missatge enviat</h2>
        <p>Nom: <?=$name ?></p>
        <p>Email: <?=$email ?></p>
        <p>Data de naixement: <?=$date->format("Y-m-d") ?></p>
        <p>Assumpte: <?=$subject ?></p>
        <p>Missatge: <?=$message ?></p>
    <? else :?>

        <?if (!empty($errors)) :?>
        <h2>Hi ha errors en processar el formulari</h2>
        <ul>
            <? foreach ($errors as $error) :?>
                <li><?=$error?></li>
            <? endforeach; ?>
        </ul>
        <? endif ;?>
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
                <label for="subject">Subjecte:</label>
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
    <? endif; ?>
</div>
