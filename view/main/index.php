<? if ($_SESSION['successfully_authenticated']): ?>
    <div class="alert alert-success">Вы успешно вошли в систему</div>

    <div class="alert alert-light" role="alert">
        <h2>Привет! <?= $_SESSION['user']['username'] ?>, есть что то новенькое? <a href="/posts/create">ДА!</a></h2>
    </div>
    <?= $_SESSION['successfully_authenticated'] = false ?>
<? endif ?>


<? if (!empty($values['posts'])): ?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Date</th>
            <th scope="col">Content</th>
            <th scope="col">Image</th>
            <th scope="col">Tags</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($values['posts'] as $post): ?>
            <tr>
                <th scope="row"><?= $post['id'] ?></th>
                <td><a href="/posts/<?= $post['id'] ?>"><?= $post['title'] ?></a></td>
                <td><?= $post['user']['username'] ?></td>
                <td><?= $post['date'] ?></td>
                <td><?= $post['content'] ?></td>
                <td><img height="300" src="upload/images/<?= $post['image'] ?>" alt=""></td>
                <td>
                    <? foreach ($post['tags'] as $tag): ?>
                        <a href="/tags/<?= $tag['tag_id'] ?>"><span class="badge badge-secondary"><?= $tag['title'] ?></span></a>
                    <? endforeach; ?>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
<? else: ?>
    <div>
        <div>
            <hr>
            <? if (isset($_SESSION['user'])): ?>
                <h3>Постов нет, приходите позже или добавте прямо сейчас.</h3>
            <? else: ?>
                <h3>Постов нет, приходите позже или войдите в систему что бы добавить.</h3>
            <? endif; ?>
            <hr>
        </div>
    </div>
<? endif; ?>