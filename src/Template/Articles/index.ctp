<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<h1>Articles top</h1>
<p><?= $this->Html->link('新規作成', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Titleタイトル</th>
        <th>Created日時</th>
        <th>Actions編集、削除</th>

                <td>
                    <br><input type="radio" name="sex" value="guest"> ゲスト表示</br>
                    <input type="radio" name="sex" value="admin"checked>管理者表示
                </td>
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
        <td>
            <?= $this->Html->link('編集', ['action' => 'edit', $article->id]) ?>
            <?= $this->Form->postLink(
                '削除',
                ['action' => 'delete', $article->id],
                ['confirm' => 'Are you sure?'])
            ?>

        </td>
    </tr>
    <?php endforeach; ?>

</table>
