<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<h1>コメント編集ぺーじ</h1>
<!--↑後で消せで消せよや-->
<div class="container">
    <div>
        <div><input type="text" name="namae" placeholder="名前" value=""maxlength="10" pattern="^\S+$" required></div>
    </div>

    <div class="button1">
        <textarea name="content" rows="5" placeholder="コメントの本文" maxlength="400"></textarea>
    </div>
        <var>
            <?php echo $this->Form->button(__('投稿')); ?>
        </var>
        <var1>
        <!--↑これ大丈夫だっけ？-->
            <?php echo $this->Form->button(__('編集')); ?>
        </var>
</div>
