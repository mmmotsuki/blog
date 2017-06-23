<!-- File: src/Template/Articles/add.ctp -->


    <!--ログイン時の処理-->

    <!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
    <html lang="ja">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript"> -->
<head>
    <script type="text/javascript">

    function hoge(evt){
    　var t = evt.target || evt.srcElement;
    　if(t.nodeName=="BUTTON")
    　　fuga(t.getAttribute("name"));
    }

    function fuga(str){
    　var div = document.getElementById("item_list").getElementsByTagName("div");
    　for(var i=0, d; d=div[i++];)
    　　if(d.className){
    　　　var reg = new RegExp("(^|:)" + d.className + "(:|$)");
    　　　d.style.display = reg.test(str)?"":"none";
    　　}
    }

    </script>
</head>
    <!-- ↑まだ理解できてない -->
    <?php
      if(!empty( $auth )){
    ?>
<div id="item_list">
        <!-- ↑消さないで -->
    <div onclick="hoge(event)">
        <div class="admin"><button type="button" name="hide:admin:left:container:cell:box1">ゲスト表示</button></div>
        <div class="admin"><button type="button" name="show:admin:left:container:cell:box1">管理者表示</button></div>
    </div>
    <div class="left">
        <div class="show"><?= $this->Html->link('新規作成', ['action' => 'add']) ?></div>
    </div>
    <div class="container">
            <!-- <ui>Id</ui>
            <ui>Titleタイトル</ui>
            <ui>Created日時</ui>
            <div class="show">Actions編集、削除</div> -->

    <!-- ここで $articles クエリオブジェクトをループして、投稿情報を表示 -->
        <?php foreach ($articles as $article): ?>
        <div class="box1">
            <div class="cell">
                <?= $article->id ?>
            </div>
            <div class="cell">
                <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
            </div>
            <div class="cell">
                <?= $article->created->format(DATE_RFC850) ?>
            </div>
            <div class="cell"><div class="show">
                <?= $this->Html->link('編集',
                    ['action' => 'add', $article->id])
                ?>
            </div></div>
            <div class="cell"><div class="show">
                <?= $this->Form->postLink('削除',
                    ['action' => 'delete', $article->id],
                    ['confirm' => 'はい/いいえボタン'])//アラートボックス内　OK/キャンセル　を　はい/いいえ　に変えて欲しいな
                ?>    <!--if文くれ-->
            </div></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
    }else{
?>
    <!--未ログイン時の処理-->
<div class="container">
        <!-- <ui>Id</ui>
        <ui>Titleタイトル</ui>
        <ui>Created日時</ui>
        <div class="show">Actions編集、削除</div> -->

<!-- ここで $articles クエリオブジェクトをループして、投稿情報を表示 -->
    <?php foreach ($articles as $article): ?>
    <div class="box1">
        <div class="cell">
            <?= $article->id ?>
        </div>
        <div class="cell">
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
        </div>
        <div class="cell">
            <?= $article->created->format(DATE_RFC850) ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php
  }
?>
