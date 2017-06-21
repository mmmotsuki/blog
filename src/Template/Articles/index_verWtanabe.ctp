<!-- File: src/Template/Articles/index.ctp -->
<?php
  if(!empty( $auth )){
?>
    <!--ログイン時の処理-->

    <!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
    <html lang="ja"> -->
    <!-- <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript"> -->

    <script type="text/javascript">

    // function hoge(evt){
    // 　var t = evt.target || evt.srcElement;
    // 　if(t.nodeName=="BUTTON")
    // 　　fuga(t.getAttribute("name"));
    // }
    //
    // function fuga(str){
    // 　var div = document.getElementById("item_list").getElementsByTagName("div");
    // 　for(var i=0, d; d=div[i++];)
    // 　　if(d.className){
    // 　　　var reg = new RegExp("(^|:)" + d.className + "(:|$)");
    // 　　　d.style.display = reg.test(str)?"block":"none";
    // 　　}
    // }

    function guest(){
        var item = document.getElementById("bbb");
        item.style.display = "none";
        <?php foreach ($articles as $article): ?>
        disp_guest(<?= $article->id ?>);
        <?php endforeach; ?>
    }
    function disp_guest(num){
        //alert(num);
        var item = document.getElementById("aaa"+num);
        item.style.display = "none";
    }

    function admin(){
        var item = document.getElementById("bbb");
        item.style.display = "";
        <?php foreach ($articles as $article): ?>
        disp_admin(<?= $article->id ?>);
        <?php endforeach; ?>
    }
    function disp_admin(num){
        //alert(num);
        var item = document.getElementById("aaa"+num);
        item.style.display = "";
    }

    </script>
    <!-- ↑まだ理解できてない -->

<!-- <div id="item_list"> -->
        <!-- ↑消さないで -->
    <!-- <div onclick="hoge(event)"> -->
        <div class="admin"><button type="button" onclick=guest();>ゲスト表示</button></div>
        <div class="admin"><button type="button" onclick=admin();>管理者表示</button></div>
    <!-- </div> -->
    <div class="left">
        <div class="show" id="bbb"><?= $this->Html->link('新規作成', ['action' => 'add']) ?></div>
    </div>
    <div class="container">
            <!-- <ui>Id</ui>
            <ui>Titleタイトル</ui>
            <ui>Created日時</ui>
            <div class="show">Actions編集、削除</div> -->

    <!-- ここで $articles クエリオブジェクトをループして、投稿情報を表示 -->
        <?php foreach ($articles as $article): ?>
        <div>
            <div class="cell">
                <?= $article->id ?>
            </div>
            <div class="cell">
                <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
            </div>
            <div class="cell">
                <?= $article->created->format(DATE_RFC850) ?>
            </div>
            <div class="cell" id="aaa<?= $article->id ?>"><!--<div class="show">-->
                <?= $this->Html->link('編集',
                    ['action' => 'add', $article->id])
                ?>
                <?= $this->Form->postLink('削除',
                    ['action' => 'delete', $article->id],
                    ['confirm' => 'はい/いいえボタン'])//アラートボックス内　OK/キャンセル　を　はい/いいえ　に変えて欲しいな
                ?>    <!--if文くれ-->
            </div><!--</div>-->
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
    <div>
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
