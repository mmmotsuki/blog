<!-- File: src/Template/Articles/add.ctp -->

<body>
    <div>
        <div>
            <?php echo $this->Form->create($article); ?>
        </div>
        <div>
            <?php echo $this->Form->control('記事のタイトル'); ?><!--titleいじるとアラートでなくなる-->
        </div>
        <div>
            <?php echo $this->Form->control('記事の本文', ['rows' => '3']); ?><!--bodyいじるとアラートでなくなる-->
        </div>
        <div>
            <?php echo $this->Form->button(__('画像')); ?><!--ボタン変えて！関数探して-->
        </div>
        <div>
            <?php echo $this->Form->button(__('削除')); ?><!--ボタン変えて！関数探して-->
        </div>
        <div>
            <input type="text" name="namae" placeholder="画像ファイル" value=""maxlength="10">
            <!--  echo $this->Form->control('画像ファイル');  -->
        </div>
        <div>
            <input type="radio" name="image" value="image"checked> 画像上
            <input type="radio" name="image" value="image">画像下
        </div>
        <div>
            <?php echo $this->Form->button(__('投稿')); ?>
        </div>
        <div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</body>
