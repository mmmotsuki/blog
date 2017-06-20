<!-- File: src/Template/Articles/add.ctp -->
<body>
<h1>Add Article</h1>
    <div>
        <div>
            <?php echo $this->Form->create($article, ['type'=>'file']); ?>
        </div>
        <div>
        </div>
        <?php echo $this->Form->control('title'); ?><!--titleいじるとアラートでなくなる-->
        <div>
            <?php echo $this->Form->control('body', ['rows' => '3']); ?><!--bodyいじるとアラートでなくなる-->
        </div>
        <div>
            <?php echo $this->Form->input('name'); ?>
            <?php echo $this->Form->file('img'); ?>
        </div>
        <div>
            <!-- <?php echo $this->Form->button(__('削除')); ?> -->
        </div>
        <div>
            <input type="radio" name="top" value="image"checked> 画像上
            <input type="radio" name="bottom" value="image">画像下
        </div>
        <div>
            <?php echo $this->Form->button(__('投稿')); ?>
        </div>
        <div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</body>
