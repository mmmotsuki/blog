<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<div class="container">
    <h1>コメント編集</h1>
    <?php echo $this->Form->create($comment); ?>
    <div>
        <?php echo $this->Form->control('name', ['readonly' => "readonly"]); ?>
    </div>

<<<<<<< HEAD
    <div class="button1">
        <?php echo $this->Form->control('body', ['rows' => '5']); ?>
<<<<<<< HEAD
    </div>
        <var>
            <?php echo $this->Form->button(__('編集'), ['name' => 'edit']); ?>
        </var>
        <var>
            <?= $this->Html->link('削除',
                ['action' => 'deletecomment', 'onclick' => "return confirm('削除します')", $comment->id])
            ?>
        </var>
</div>
=======
=======
    <div>
        <?php echo $this->Form->control('body', ['rows' => '5','maxlength' => '300']); ?>
>>>>>>> 430328720ea2886b33afdfadb3f7f326e208ecde

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
<<<<<<< HEAD

    <div class="cell"><div class="show">
        <?php echo $this->Form->create($comment); ?>
        <?= $this->Form->postLink('削除',
            ['action' => 'deletecomment', $comment->id],
            ['confirm' => 'はい/いいえボタン'])//アラートボックス内　OK/キャンセル　を　はい/いいえ　に変えて欲しいな
        ?>    <!--if文くれ-->
        <?php echo $this->Form->end(); ?>

    </div>
>>>>>>> 8b438900c0f2fead9c744af9f67e7dad73a0de47
=======
</div>
>>>>>>> 851e73ede2bb884079ae07e4a39783c795cd907a
