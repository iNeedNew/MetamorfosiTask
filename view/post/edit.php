<form method="post" action="/posts/<?= $values['post']['id'] ?>/update" enctype="multipart/form-data">

    <input type="hidden" name="token" value="<?= $values['token']; ?>">

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" value="<?= $values['post']['title'] ?>" id="title" name="title">
    </div>

    <div class="form-group">
        <label for="content">Text</label>
        <textarea class="form-control" id="content" name="content" rows="3"><?= $values['post']['content'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="tags">Tags <a href="/tags/create">создать новый тег</a></label>
        <select class="form-control" id="tags" name="tags[]" multiple>
            <? foreach ($values['tags'] as $tag): ?>
                <option value="<?= $tag['id'] ?>" <?= in_array($tag['id'], $values['post_tags']) ? 'selected' : '' ?>><?= $tag['title'] ?></option>
            <? endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Превью</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>

    <img style="width: 100%" src="/upload/images/<?= $values['post']['image'] ?>">

    <button type="submit" class="btn btn-primary mt-3 mb-3">Редактировать</button>

</form>