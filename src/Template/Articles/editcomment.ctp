<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<h1>コメント編集ぺーじ</h1>
<!--↑後で消せで消せよや-->
<div class="container">
    <div>
        <div><input type="text" name="namae" placeholder="名前" value=""maxlength="10" pattern="^\S+$" required></div>
    </div>

    <!--<input type="text">-->
    <div class="button1">
        <textarea name="content" rows="5" placeholder="コメントの本文" maxlength="400"></textarea>
    </div>

    <form action="../articles/view/1" method="post">

        <var>
            <?php echo $this->Form->button(__('編集')); ?>
        </var>
    </form>
    <form action="../articles/view/1" method="post">
        <var1>
            <?php echo $this->Form->button(__('削除')); ?>
        </var1>
    </form>
    <form action="../articles/view/1" method="post">

        <var>
            <?php echo $this->Form->button(__('記事に戻る')); ?>
        </var>
    </form>
</input>
</div>
