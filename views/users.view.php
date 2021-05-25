<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Users</h1>

    </div>

    <div class="col-12 col-sm-12 col-lg-8 col-md-8 p-1">
        <div class="input-group mb-3">

        </div>


</div>
<div class="row p-3">
    <?php if(empty($users)) { ?>
        <h3>No s'ha trobat cap element</h3>
    <?php }else{ ?>
        <table class="table table-striped shadow " >
            <tr>
                <th class="text-center">Nom</th>
                <th class="text-center">Rol</th>
            </tr>

            <?php foreach ($users as $user){ ?>
                <tr>
                    <td class="text-center"><?= $user->getUsername() ?></td>
                    <td class="text-center"><?= $user->getRole() ?></td>

                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</div>
