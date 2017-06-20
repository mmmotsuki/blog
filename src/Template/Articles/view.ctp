<!-- File: src/Template/Articles/view.ctp -->

<h1><?= h($article->title) ?></h1>
<div><?= h($article->image) ?></div><!--ここに画像上が出るように変えてね-->
<div><?= h($article->body) ?></div>
<div><?= h($article->image) ?></div><!--ここに画像下が出るように変えてね-->
<div><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></div>
<div><small>Edited: <?= $article->created->format(DATE_RFC850) ?></small></div><!--編集日時に変えてね-->




<form action="../addcomment" method="post">
    <div>
        <div><input type="text" name="name" placeholder="コメント投稿者名" value=""maxlength="10"></div>
        <div><input type="text" name="pass" placeholder="コメントのパスワード" value=""maxlength="10"></div>
    </div>
    <div class="button1">
        <textarea name="body" rows="5" placeholder="コメントの本文" maxlength="400"></textarea>
        <input type="hidden" name="articles_id" value="1">

            <!-- 1は記事番号で、後に変数表示にして記事詳細ページに行く時に受け渡されるようにする）-->
            <?=$this->Form->submit('投稿')?>
            <!--<imput>タグを使う submit = ???</imput> -->

    </div>

</form>

        <!--新規投稿が押されると確認アラートが出て、OKを押すとページを更新（新規投稿は同じページに遷移して
        コメントの内容を追加する-->


        <!--<?php echo $this->Form->button(__('投稿'));?>  ただのボタン -->
 <!-- 送信するとエラーが出る-->
        <!-- <input type="submit" value="投稿" />--><!-- ボタン作ってね -->
        <!-- 確認アラート -->

<!--
<div>
    <input type="text" name="com_view" placeholder="コメント" value="" maxlength="0">
    </div>-->

<!-- com_boxの内容を送信する-->
<form action="../com" method="post">

    <div class="button1">
        <!--<?php echo $this->Form->button(__('編集')); ?> ただのボタン -->
            <?=$this->Form->submit('編集')?>
    </div>
</form>





    <!--どこのコメント欄から来たかの情報を別に送信する必要がある -->

    <!-- <input type="submit" value="編集" /> --> <!-- ボタン作ってね -->
