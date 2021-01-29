<?php use App\Core\App;
?>
<div class="container" >
    <?php if (!empty($message)){?>
        <div class="alert alert-danger" role="alert">
            <?=$message?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-12">

            <form method="post" novalidate>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control"
                           name="username" id="username"
                           value="<?= null ?? "" ?>"
                           placeholder="Username:" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control"
                           name="password" id="password"
                           value="<?= null ?? "" ?>"
                           placeholder="Password:" required>
                </div>
                <input type="submit" value="Login">
            </form>

        </div>
        <a class="" href="/register">
            <span style="color: #222;" class="mb-2">Or register a new user.</span>
        </a>
    </div>
</div>
