<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<h1>コメント編集ぺーじ</h1>
<!--↑後で消せで消せよや-->
<div class="container">
    <?php echo $this->Form->create($comment); ?>
    <div>
        <!-- 入力フォームではなく、表示のみに変更おねがいします（OTSUKI） -->
        <?php echo $this->Form->control('name'); ?>
    </div>

    <div class="button1">
        <?php echo $this->Form->control('body', ['rows' => '5']); ?>
    </div>
        <var>
            <?php echo $this->Form->button(__('投稿')); ?>
        </var>
        <var1>
            <?php echo $this->Form->button(__('編集')); ?>
        </var>
</div>
