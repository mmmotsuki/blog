<!-- File: src/Template/Articles/add.ctp -->
<body>
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
            <!-- <?php echo $this->Form->file('upfile', array('accept' => "image/jpeg, image/png")); ?> -->
        </div>
<!--ここから松元変更しました-->
        <div>
            <?php echo $this->Form->file('upfile', array('id' => 'file1', 'accept' => "image/jpeg, image/png")); ?>
            <script type="text/javascript" language="javascript">

                function hoge() {
                    document.getElementById("file1").value="";
                }
            </script>
            <input type="button" id="clear" value="消去" onClick="hoge()" />
        </div>

<!--ここまで松元変更しました-->
        <div style="display:inline-flex">
            <?php echo $this->Form->radio('position',
                [
                    ['value' => 'top', 'text' => '上 　'],
                    ['value' => 'bottom', 'text' => '下']
                ]); ?>
        </div>
            <!-- <input type="radio" name="position" value="top" checked> 画像上
            <input type="radio" name="position" value="bottom">画像下 -->
        <div>
            <?php echo $this->Form->button(__('投稿')); ?>
        </div>
        <div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</body>
