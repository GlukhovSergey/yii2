<a href="/index.php?r=tasks/view&id=<?= $model->id ?>" style="text-decoration: none;">
    <div class="panel panel-default" style="width: 40rem;">
        <h5 class="panel-heading"><?= $model->name ?></h5>
        <p class="panel-body"><?= $model->description ?></p>
        <ul class="list-group">
            <li class="list-group-item">Ответственный: <?= $model->responsible->username ?></li>
            <li class="list-group-item">Срок выполнения: <?= $model->deadline ?></li>
        </ul>
        <? foreach ($images as $image): ?>
            <img src="/img/small/<?= $image->filePath ?>" class="card-img-top"
                 alt="<?= $image->filePath ?>">
        <? endforeach; ?>
    </div>
</a>
