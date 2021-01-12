<form action="<? $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" novalidate>
    <div class="form-group">
        <label for="name">Name:</label>
        <input id="name" class="form-control" type="text" name="name" required>
    </div>
    <div class="form-group">
        <label for="logo">Logo:</label>
        <input id="logo" class="form-control-file" type="file" name="logo" required>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

