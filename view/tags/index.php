<a href="/tags/create">
    <button type="button" class="btn btn-primary">Новый тег</button>
</a>
<hr>
<? foreach ($values['tags'] as $tag): ?>
    <a href="/tags/<?= $tag['id'] ?>">
        <div class="d-inline p-2 bg-primary text-white pr-1" style="border-radius: 3px"><?= $tag['title'] ?></div>
    </a>
<? endforeach; ?>
