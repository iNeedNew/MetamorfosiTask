<?// if ($_SESSION['no_preview_file']): ?>
<!--    <div class="alert alert-light" role="alert">-->
<!--        Выберете превью, с раширением .png или .jpeg-->
<!--    </div>-->
<!--    --><?//= $_SESSION['no_preview_file'] = false ?>
<?// endif ?>
<!---->
<?// if ($_SESSION['wrong_file_extension']): ?>
<!---->
<!--    <div class="alert alert-danger" role="alert">-->
<!--        Разширение файла не поддерживается. Подоходит .png или.jpeg-->
<!--    </div>-->
<!--    --><?//= $_SESSION['wrong_file_extension'] = false ?>
<?// endif ?>
<form method="post" action="/posts/upload" enctype="multipart/form-data">

    <input type="hidden" name="token" value="<?= $values['token']; ?>">

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="form-group">
        <label for="content">Text</label>
        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="tags">Tags <a href="/tags/create">создать новый тег</a></label>
        <select class="form-control" id="tags" name="tags[]" multiple>
            <? foreach ($values['tags'] as $tag): ?>
                <option value="<?= $tag['id'] ?>"><?= $tag['title'] ?></option>
            <? endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Превью</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>

</form>