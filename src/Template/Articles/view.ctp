
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
<div><?= h($article->image) ?></div><!--ここに画像上が出るように変えてね-->
<div><?= h($article->body) ?></div>
<div><?= h($article->image) ?></div><!--ここに画像下が出るように変えてね-->
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
foreach($article->comments as $a):?>
    <tr>
    <td>コメントID:<?= $a->id?></td>
<!-- それぞれのコメントの後ろに -->
    <td>名前:<?=$a->name?></td>
    <td>コメント内容:<?=$a->body?></td>
    <td>パスワード(非表示):<?=$a->pass?></td>
    <td>投稿日時:<?=$a->created?></td>
    <td>
    <form action="../com/<?=$a->id?>" method="post">
    <?=$this->Form->submit('コメント編集')?>
</form></td>
    </tr>
<?php endforeach?>
</table>



    <form action="../view/1" method="post">
        <div class="button1">
            <?=$this->Form->submit('編集')?>
            <!--ページ内容編集用のページ-->


        </div>
    </form>
