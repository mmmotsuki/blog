<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<h1>コメント編集ぺーじ</h1>
<!--↑後で消せで消せよや-->
<div class="container">
    <?php echo $this->Form->create($comment); ?>
    <div>
        <!-- 入力フォームではなく、表示のみに変更おねがいします（OTSUKI） -->
        <?php echo $this->Form->control('name', ['readonly' => "readonly"]); ?>
    </div>

    <div class="button1">
        <?php echo $this->Form->control('body', ['rows' => '5']); ?>

    </div>
    <div class="rap_buttons">
            <div>
                <?php echo $this->Form->button(__('編集'), ['name' => 'edit']); ?>
            </div>
            <div class="right">
                <?= $this->Html->link('削除',['action' => 'deletecomment', 'onclick' => "return confirm('削除します')", $comment->id],['id' => 'iphone'])
                ?>
            </div>
        </div>
    </div>
