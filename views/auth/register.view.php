<?php if (!empty($message)){?>
    <div class="alert alert-danger" role="alert">
        <?=$message ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
<form action="" novalidate method="post">

        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr><br>
    <div class="form-group">
        <label for="email"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="user" id="user" required>
    </div>

    <div class="form-group">
        <label for="email"><b>Password</b></label>
        <input type="text" placeholder="Enter Password" name="password" id="password" required>
    </div>

    <div class="form-group">
        <label for="email"><b>Repeat Password</b></label>
        <input type="text" placeholder="Repeat Password" name="password2" id="repeat-pssw" required>
    </div>

        <input type="submit" class="btn btn-primary"></input>
</form>


