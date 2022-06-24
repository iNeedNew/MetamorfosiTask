<h2><?= $values['tag']['title'] ?></h2>
<hr>

<a href="/tags/<?= $values['tag']['id'] ?>/edit">
    <button type="button" class="btn btn-primary">Редактировать</button>
</a>
<a href="/tags/<?= $values['tag']['id'] ?>/delete">
    <button type="button" class="btn btn-danger">Удалить</button>
</a>
<hr>

<? if (!empty($values['posts'])): ?>

    <h4>Посты, в которых встречается этот тег</h4>
    <ul class="list-group mt-3">
        <? foreach ($values['posts'] as $post): ?>
            <a href="/posts/<?= $post['post_id'] ?>">
                <li class="list-group-item mt-1"><?= $post['title'] ?></li>
            </a>
        <? endforeach; ?>
    </ul>

<? endif; ?>




