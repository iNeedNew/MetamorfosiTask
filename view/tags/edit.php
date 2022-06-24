<form method="post" action="/tags/<?= $values['tag']['id'] ?>/update">

    <input type="hidden" name="token" value="<?= $values['token']; ?>">

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" value="<?= $values['tag']['title'] ?>" id="title" name="title">
    </div>
    <button type="submit" class="btn btn-primary">Редактировать</button>

</form>