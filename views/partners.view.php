<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Partners</h1>

    </div>

        <div class="col-12 col-sm-12 col-lg-8 col-md-8 p-1">
            <div class="input-group mb-3">
                <form method="post" action="<?=$router->getUrl("partners_filter")?>"
                class="form-inline  justify-content-center my-4">
                <input name="text" class="form-control w-75 mr-sm-4"
                       value="<?= ($_POST["text"]) ?? "" ?>"
                       type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>

        </div>
        <div class="col-12 col-sm-12 col-lg-4 col-md-4 p-1">
            <a href="partners/create" ><button class="btn btn-primary">Nou Partner</button></a>
        </div>

    </div>
    <div class="row p-3">
        <? if (empty($partners)) : ?>
            <h3>No s'ha trobat cap element</h3>
        <? else: ?>
        <table class="table table-striped shadow " >
            <tr>
                <th class="text-center">Foto</th>
                <th class="text-center">Nom</th>
                <th class="text-center">Accions</th>
            </tr>

            <?php foreach ($partners as $partner) : ?>
                <tr>
                    <td class="text-center"><?= $partner->getName() ?></td>
                    <td class="text-center"><img alt="logo" style="width: 200px; height: auto" class="img-thumbnail" src="<?= $partnersPath . $partner->getLogo() ?>"></td>
                    <td class="text-center">
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


