<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<div class="container">
    <h1>コメント編集</h1>
    <?php echo $this->Form->create($comment); ?>
    <div>
        <?php echo $this->Form->control('name', ['readonly' => "readonly"]); ?>
    </div>

    <div>
        <?php echo $this->Form->control('body', ['rows' => '5','maxlength' => '300']); ?>

    </div>
    <div class="rap_buttons">
        <div>
            <?php echo $this->Form->button(__('編集'), ['name' => 'edit','maxlength' => '1000']); ?>
        </div>
        <div>
            <?= $this->Html->link('削除', ['action' => 'deletecomment', $comment->id], ['id' => 'buttonright', 'confirm' => '削除してもよろしいですか'])
            ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
