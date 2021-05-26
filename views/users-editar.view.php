
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Edit User</h1>
            <form action="<?= $router->getUrl("users_updated", ["id"=>$user->getId()]); ?>" method="post" enctype="multipart/form-data" novalidate>
                <input type="hidden" name="id" value="<?=$user->getId()?>">
                <div class="form-group">
                    <label for="username">Name:</label>
                    <input id="username" class="form-control" type="text" name="username"
                           value="<?= $user->getUsername()?>" required>
                </div>
                <div class="form-group">
                    <label for="tipus">ROL:</label>
                    <select id="role" name="role" class="form-control" required>
                        <option selected disabled value="Tria un">-- Tria un ROL --</option>
                        <option  value="ROLE_USER">USUARI</option>
                        <option value="ROLE_ADMIN">ADMIN</option>

                    </select>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
    <!-- /.row -->
</div>
