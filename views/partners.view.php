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
                <div class="col-12">
                    <form method="post" action="<?=$router->getUrl("partners_filter")?>"
                          class="form-inline  justify-content-center my-4">
                        <input name="text" class="form-control w-75 mr-sm-4"
                               value="<?= ($_POST["text"]) ?? "" ?>"
                               type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <div class="text-right mb-3"><a class="btn btn-primary" href="<?=$router->getUrl("partners_create")?>"
                            title="create a new partner"><i class="fa fa-plus-circle"></i> New Partner</a></div>
                </div>
                <p><?=$error??""?></p>
            </div>
            <? if (empty($partners)) : ?>
                <h3>No s'ha trobat cap element</h3>
            <? else: ?>
                <table class="table">
                    <tr>
                        <th>Company</th>
                        <th>Logo</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($partners as $partner) : ?>
                        <tr>
                            <td><?= $partner->getName() ?></td>
                            <td><img alt="logo" class="img-thumbnail" src="<?= $partnersPath . $partner->getLogo() ?>"></td>
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
