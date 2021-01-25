<form action="" method="post" enctype="multipart/form-data" novalidate>
    <div class="form-group">
        <label for="title">Title:</label>
        <input id="title" class="form-control" type="text" name="title" required>
    </div>
    <div class="form-group">
        <label for="overview">Overview:</label>
        <textarea id="overview" name="overview" class="form-control rounded-0" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="release_date">Release date:</label>
        <input id="release_date" class="form-control" type="date" name="release_date" required>
    </div>
    <div class="form-group">
        <label for="tagline">Tagline:</label>
        <input id="tagline" class="form-control" type="text" name="tagline">
    </div>

    <div class="form-group">
        <label for="genre_id">Genre</label>
        <select class="form-control" name="genre_id" id="genre_id"
        <?php foreach ($genres as $genre): ?>
            <option value="<?=$genre->getId() ?>"><?=$genre->getName() ?></option>
        <?php endforeach; ?>
        </select>
    </div>


    <div class="form-group">
        <label for="poster">Poster:</label>
        <input id="poster" class="form-control" type="file" name="poster" required>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>