<!-- File: src/Template/Articles/add.ctp -->
<head>
<div><a href="index">Articles</a></div>
<div><a href="login">ログイン</a></div>
</head>

<body>
<h1>Articles top</h1>
<p><?= $this->Html->link('新規作成', ['action' => 'add']) ?></p>
<div>
    <div>
        <div>Id</div>
        <div>Titleタイトル</div>
        <div>Created日時</div>
        <div>Actions編集、削除</div><!--ゲスト時には隠して欲しいな-->
                <div>
                    <br><input type="radio" name="sex" value="guest"> ゲスト表示</br>
                    <input type="radio" name="sex" value="admin"checked>管理者表示
                </div>
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
            <?= $this->Html->link('編集',
                ['action' => 'add', $article->id])
            ?>
            <?= $this->Form->postLink('削除',
                ['action' => 'delete', $article->id],
                ['confirm' => 'はい/いいえボタン'])//アラートボックス内　OK/キャンセル　を　はい/いいえ　に変えて欲しいな
            ?>
        </div>　<!--ゲスト時には隠して欲しいな-->
    </div>
    <?php endforeach; ?>

</div>
</body>
