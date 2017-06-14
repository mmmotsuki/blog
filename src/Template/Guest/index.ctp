<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<h1>Articles top</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Titleタイトル</th>
        <th>Created日時</th>



    </tr>
<!-- ここで $articles クエリオブジェクトをループして、投稿情報を表示 -->

    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?= $article->id ?></td>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>

    </tr>
    <?php endforeach; ?>

</table>
