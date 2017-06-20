<<<<<<< HEAD
<!-- File: src/Template/Articles/view.ctp -->
<?php
  if(!empty( $auth )){
?>
    <!--ログイン時の処理-->

<body>
=======
>>>>>>> origin/20170620
<h1><?= h($article->title) ?></h1>
<div class="button1">
    <div><button type="button" value="編集">編集</button></div>
</div>
<div><?= h($article->image) ?></div><--ここに画像上が出るように変えてね-->
<div><?= h($article->body) ?></div>
<div><?= h($article->image) ?></div><--ここに画像下が出るように変えてね-->
<div><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></div>
<<<<<<< HEAD
<div><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></div><!--編集日時に変えてね-->
<!-- <div>ここからコメントテーブル
    <div><input type="text" name="namae" placeholder="コメントの最新編集日時" value=""maxlength="0"></div>
    <div><input type="text" name="namae" placeholder="コメントの投稿日時" value=""maxlength="0"></div>
</div> -->
<!-- <div>
    <div><input type="text" name="namae" placeholder="コメントの名前" value=""maxlength="10"></div>
    <div><input type="text" name="namae" placeholder="コメントのパスワード" value=""maxlength="10"></div>
</div> -->
<div>
    <div>
        <?php echo $this->Form->control('名前'); ?><!--titleいじるとアラートでなくなる-->
    </div>
    <div>
        <?php echo $this->Form->control('パスワード'); ?><!--titleいじるとアラートでなくなる-->
=======
<div><small>Edited: <?= $article->created->format(DATE_RFC850) ?></small></div><!--編集日時に変えてね-->

<form action="../addcomment" method="post">
    <div>
        <div><input type="text" name="name" placeholder="コメント投稿者名" value=""maxlength="10"></div>
        <div><input type="password" name="pass" placeholder="コメントのパスワード" value=""maxlength="10"></div>
>>>>>>> origin/20170620
    </div>
</div>
<div>
    <div class="button1">
<<<<<<< HEAD
        <textarea name="content" rows="5" placeholder="コメントの本文" maxlength="400"></textarea><input type="submit" value="投稿" /><!-- ボタン作ってね -->
    </div>
    <div>
        <div><input type="text" name="namae" placeholder="コメント" value=""maxlength="0"></div>
        <div class="button2">
        <input type="submit" value="編集" /><!-- ボタン作ってね -->
        </div>
    </div>
</div>
</body>
<?php
  }else{
?>
    <!--未ログイン時の処理-->

<body>
<h1><?= h($article->title) ?></h1>

<div><?= h($article->image) ?></div><--ここに画像上が出るように変えてね-->
<div><?= h($article->body) ?></div>
<div><?= h($article->image) ?></div><--ここに画像下が出るように変えてね-->
<div><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></div>
<div><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></div><!--編集日時に変えてね-->
<div>ここからコメントテーブル
    <div><input type="text" name="namae" placeholder="コメントの最新編集日時" value=""maxlength="0"></div>
    <div><input type="text" name="namae" placeholder="コメントの投稿日時" value=""maxlength="0"></div>
</div>
<!-- <div>
    <div><input type="text" name="namae" placeholder="コメントの名前" value=""maxlength="10"></div>
    <div><input type="text" name="namae" placeholder="コメントのパスワード" value=""maxlength="10"></div>
</div> -->
<div>
    <div>
        <?php echo $this->Form->control('名前'); ?><!--titleいじるとアラートでなくなる-->
    </div>
    <div>
        <?php echo $this->Form->control('パスワード'); ?><!--titleいじるとアラートでなくなる-->
    </div>
</div>
<div>
    <div class="button1">
        <!-- <textarea name="content" rows="5" placeholder="コメントの本文" maxlength="400"></textarea> -->
        <div>
            <?php echo $this->Form->control('コメントの本文', ['rows' => '3']); ?><!--bodyいじるとアラートでなくなる-->
        </div>
        <input type="submit" value="投稿" /><!-- ボタン作ってね -->
    </div>
    <div>
        <div><input type="text" name="namae" placeholder="コメント" value=""maxlength="0"></div>
        <div class="button2">
        <input type="submit" value="編集" /><!-- ボタン作ってね -->
        </div>
    </div>
</div>
</body>
<?php
  }
?>
=======
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
>>>>>>> origin/20170620
