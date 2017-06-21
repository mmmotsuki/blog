
<!-- ログイン時のみ記事編集ボタン表示 (OTSUKI) -->
<?php if(!empty( $auth )) { ?>
    <div>
    <!-- ※ボタンによる操作が上手くできないので、現状リンクです -->
    <?= $this->Html->link('編集', ['action' => 'add', $article->id])
    ?>
    </div>
    <!-- <div class="show">
        <?= $this->Form->button('編集', ['action'=>'add', "type"=>"botton", $article->id]); ?>
    </div>
<?php } ?> -->
<!-- /////////////////////////////// -->

<h1><?= h($article->title) ?></h1>

<!-- 画像表示（上）（OTSUKI）-->
<?php
if($article->position == 'top') {
    echo "<div>";
    echo $this->Html->image($article->upfile);
    echo "</div>";
}
?>

<div><?= h($article->body) ?></div>

<!-- 画像表示（下）（OTSUKI）-->
<?php
if($article->position == 'bottom') {
    echo "<div>";
    echo $this->Html->image($article->upfile);
    echo "</div>";
}
?>

<div><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></div>
<div><small>Edited: <?= $article->created->format(DATE_RFC850) ?></small></div><!--編集日時に変えてね-->

<form action="../addcomment" method="post">
    <div>
        <div><input type="text" name="name" placeholder="コメント投稿者名" value=""maxlength="10"></div>
        <div><input type="password" name="pass" placeholder="コメントのパスワード" value=""maxlength="10"></div>
    </div>
    <div class="button1">
        <textarea name="body" rows="5" placeholder="コメントの本文" maxlength="400"></textarea>
        <input type="hidden" name="articles_id" value="1">
            <?=$this->Form->submit('投稿')?>
    </div>
</form>

<table border="1">
<?php
//var_dump($article->comments[6]->body);
//comments(小文字のcでcomments)はcakePHPで定義されている文言
foreach($article->comments as $a){
    echo"<tr>";
    echo "<td>"."記事ID:".$a->id."</td>";

//それぞれのコメントの後ろに

    echo "<td>"."名前:".$a->name."</td>";
    echo "<td>"."コメント内容:".$a->body."</td>";
    echo "<td>"."パスワード(非表示):".$a->pass."</td>";
    echo "<td>"."投稿日時:".$a->created."</td>"."<br>";
    //テーブルかCSSでソートする
    echo"</tr>";
}
?>
</table>

    <form action="../view/1" method="post">
        <div class="button1">
            <?=$this->Form->submit('編集')?>
        </div>
    </form>
