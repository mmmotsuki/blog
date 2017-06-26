<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<div class="container">
    <?php echo $this->Form->create($comment); ?>
    <div>
        <?php echo $this->Form->control('name', ['readonly' => "readonly"]); ?>
    </div>

    <div class="button1">
        <?php echo $this->Form->control('body', ['rows' => '5']); ?>

    </div>
    <div class="rap_buttons">
            <div>
                <?php echo $this->Form->button(__('編集'), ['name' => 'edit']); ?>
            </div>
            <div>
                <?= $this->Html->link('削除', ['action' => 'deletecomment', $comment->id], ['id' => 'right2', 'confirm' => '削除してもよろしいですか'])
                ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>

    <div class="cell"><div class="show">
        <?php echo $this->Form->create($comment); ?>
        <?= $this->Form->postLink('削除',
            ['action' => 'deletecomment', $comment->id],
            ['confirm' => 'はい/いいえボタン'])//アラートボックス内　OK/キャンセル　を　はい/いいえ　に変えて欲しいな
        ?>    <!--if文くれ-->
        <?php echo $this->Form->end(); ?>

    </div>
