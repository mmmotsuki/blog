<!-- File: src/Template/Articles/add.ctp -->
<body>
<h1>Articles top</h1>
<p><?= $this->Html->link('新規作成', ['action' => 'add']) ?></p>    <!--if文くれ-->
<div>
    <div>
        <div>Id</div>
        <div>Titleタイトル</div>
        <div>Created日時</div>
        <div class="visi">Actions編集、削除</div><!--ゲスト時には隠して欲しいな-->
                <div>
                    <form>
                        <br><input type="radio" name="disp" value="undisplay" onclick="hyoji1(1)">ゲスト表示</br>
                        <input type="radio" name="disp" value="display"checked onclick="hyoji1(0)">管理者表示
                    </form>
                    <script>
                    function hyoji1(num)
                    {
                      if (num == 0)
                      {
                        var e = document.getElemenstByclassname("visi").style.visibility="visible";
                        for(var = i; i < e.length; i++){
                            e[i].display.style = "visible";
                        }
                      }
                      else
                      {
                        var e = document.getElementByclassname("visi").style.visibility="hidden";
                        for(var = i; i < e.length; i++){
                            e[i].display.style = "hidden";
                        }
                      }
                    }
                    </script>
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
        <div class="visi">
            <?= $this->Html->link('編集',
                ['action' => 'add', $article->id])
            ?>    <!--if文くれ-->
            <?= $this->Form->postLink('削除',
                ['action' => 'delete', $article->id],
                ['confirm' => 'はい/いいえボタン'])//アラートボックス内　OK/キャンセル　を　はい/いいえ　に変えて欲しいな
            ?>    <!--if文くれ-->
        </div>　<!--ゲスト時には隠して欲しいな-->
    </div>
    <?php endforeach; ?>

</div>
</body>
