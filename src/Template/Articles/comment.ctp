<!-- File: src/Template/Articles/index.ctp (delete links added) -->
<body>
<p><?= $this->Html->link('Add Article', ['action' => 'add']) ?></p>
<div>
    <div>
        <div>Id</div>
        <div>Title</div>
        <div>Created</div>
        <div>Actions</div>
    </div>

<!-- ここで $articles クエリオブジェクトをループして、投稿情報を表示 -->

    <?php foreach ($articles as $article): ?>
    <div>
        <div><?= $article->id ?></div>
        <div>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
        </div>
        <div>
            <?= $article->created->format(DATE_RFC850) ?>
        </div>
        <div>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $article->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>
        </div>
    </div>
    <?php endforeach; ?>

</div>
</body>
