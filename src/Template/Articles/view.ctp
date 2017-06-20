<!-- File: src/Template/Articles/view.ctp -->
<?php
  if(!empty( $auth )){
?>
    <!--ログイン時の処理-->

<body>
<h1><?= h($article->title) ?></h1>
<div class="button1">
    <div><button type="button" value="編集">編集</button></div>
</div>
<div><?= h($article->image) ?></div><--ここに画像上が出るように変えてね-->
<div><?= h($article->body) ?></div>
<div><?= h($article->image) ?></div><--ここに画像下が出るように変えてね-->
<div><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></div>
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
    </div>
</div>
<div>
    <div class="button1">
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
