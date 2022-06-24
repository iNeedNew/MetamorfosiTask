<h2><?= $values['post']['title'] ?></h2>

<img style="width: 100%" src="/upload/images/<?= $values['post']['image'] ?>">

<h4 class="m-5"><?= $values['post']['content'] ?></h4>

<? foreach ($values['tags'] as $tag): ?>
    <a href="/tags/<?= $tag['tag_id'] ?>">
        <div class="d-inline p-2 bg-primary text-white"><?= $tag['title'] ?></div>
    </a>
<? endforeach; ?>
<hr>


<h4><span class="badge badge-light"><?= $values['post']['user']['username'] ?></span></h4>
<span><?= $values['post']['date'] ?></span>



<? if ($_SESSION['user']['id'] == $values['post']['user_id']): ?>
    <hr>
    <a href="/posts/<?= $values['post']['id'] ?>/edit">
        <button type="button" class="btn btn-primary">Редактировать</button>
    </a>
    <a href="/posts/<?= $values['post']['id'] ?>/delete">
        <button type="button" class="btn btn-danger">Удалить</button>
    </a>
<? endif ?>