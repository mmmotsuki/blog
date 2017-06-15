<!-- File: src/Template/Articles/add.ctp -->
<head>
<div><a href="index">Articles</a></div>
<div><a href="login">ログイン</a></div>
</head>

<body>
<h1>Articles top</h1>
<div>
    <div>
        <div>Id</div>
        <div>Titleタイトル</div>
        <div>Created日時</div>
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
    </div>
    <?php endforeach; ?>

</div>
</body>
