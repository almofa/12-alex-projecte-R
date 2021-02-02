<div class="container-fluid navbar">
<div class="row filanav">
        <div class="col-4 navitems">
            <a href="admin">
                Partners
            </a>
        </div>
        <div class="col-4 navitems">
            <a href="users">
                Users
            </a>
        </div>
        <div class="col-4 navitems">
            <a href="products">
                Productes
            </a>
        </div>
</div>
</div>
<div class="container-fluid maintenda">
    <div class="row primeratenda">

    </div>
</div>
<div class="container-fluid mainpartners">
    <?php if (!empty($message)){?>
        <div class="alert alert-success" role="alert">
            <?=$message ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">

                        <form method="post" action="<?=$router->getUrl("partners_filter")?>">


                            <input style="width: auto" name="text" class="buscadoradmin"
                                   value="<?= ($_POST["text"]) ?? "" ?>"
                                   type="text" placeholder="Buscar.." aria-label="Search">
                            <button class="col-1" type="submit"><i class="fa fa-search"></i></button>


                        </form>
                        <div class="text-right mb-3"><a class="btn btn-primary" href="<?=$router->getUrl("partners_create")?>"
                                                        title="create a new partner"><i class="fa fa-plus-circle"></i> New Partner</a></div>

                    <p><?=$error??""?></p>
                </div>
                <? if(empty($partners)) : ?>
                    <h3>No s'ha trobat cap element</h3>
                <? else: ?>
                    <table class="table">
                        <tr>
                            <th>Companyia</th>
                            <th>Logo</th>
                            <th>Accions</th>
                        </tr>
                        <?php foreach ($partners as $partner) : ?>
                            <tr>
                                <td><?= $partner->getName() ?></td>
                                <td><img alt="logo" class="img-thumbnail" style="height: auto; width: 300px" src="<?= $partnersPath . $partner->getLogo() ?>"></td>
                                <td>
                                    <a class="btn btn-primary" href="<?=$router->getUrl("partners_edit", ["id"=>$partner->getId()])?>">
                                        <i class="fa fa-edit"></i> Edita</a>
                                    <a class="btn btn-warning" href="<?=$router->getUrl("partners_delete", ["id"=>$partner->getId()])?>">
                                        <i class="fa fa-remove"></i> Delete</a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </table>
                <? endif; ?>

            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

