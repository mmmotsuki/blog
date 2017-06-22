<!-- File: src/Template/Articles/add.ctp -->
<body>
<h1>Add Article</h1>
    <div>
        <div>
            <?php echo $this->Form->create($article, array('type' => 'file')); ?>
        </div>
        <div>
            <?php echo $this->Form->control('title'); ?><!--titleいじるとアラートでなくなる-->
        </div>
        <div>
            <?php echo $this->Form->control('body', ['rows' => '3']); ?><!--bodyいじるとアラートでなくなる-->
        </div>
        <div>
            <?php echo $this->Form->file('upfile', array('accept' => "image/jpeg, image/png")); ?>
        </div>
        <div>
            <?php echo $this->Form->reset(__('削除'),array("class" =>'reset')); ?>
        </div>
        <div style="display:inline-flex">
            <?php echo $this->Form->radio('position',
                [
                    ['value' => 'top', 'text' => '上　'],
                    ['value' => 'bottom', 'text' => '下']
                ]); ?>
            <!-- <input type="radio" name="position" value="top" checked> 画像上
            <input type="radio" name="position" value="bottom">画像下 -->
        </div>
        <div>
            <?php echo $this->Form->button(__('投稿')); ?>
        </div>
        <div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</body>
