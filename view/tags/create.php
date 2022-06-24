<form method="post" action="/tags/upload">

    <input type="hidden" name="token" value="<?= $values['token']; ?>">

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>

</form>