<!-- File: src/Template/Articles/add.ctp -->
<head>
</head>
<body>
    <div class="container">
        <div>
            <?php echo $this->Form->create($article, array('type' => 'file')); ?>
        </div>
        <div>
            <?php echo $this->Form->control('title'); ?><!--titleいじるとアラートでなくなる-->
        </div>
        <div>
            <?php echo $this->Form->control('body', ['rows' => '3']); ?><!--bodyいじるとアラートでなくなる-->
        </div>
        <div id="special">
            <!-- <?php echo $this->Form->file('upfile', array('accept' => "image/jpeg, image/png")); ?> -->
        </div>

        <div>
            <?php echo $this->Form->file('upfile', array('id' => 'file1', 'accept' => "image/jpeg, image/png")); ?>
            <script type="text/javascript" language="javascript">

                function hoge() {
                    document.getElementById("file1").value="";
                }
                function upfile_changeHandler(e){
                    alert('世界の中心で愛を叫ぶ');
                    var files = e.target.files;
                    var fileData = "";
                    for(var i = 0; i < files.length; i++){
                        var fileVal = files[i];
                        // fileData +=
                        // 'ファイル名：' + escape(fileVal.name) + '<br>' +
                        // 'ファイルサイズ：' + fileVal.size + ' バイト<br>' +
                        // 'MIMEタイプ：' + fileVal.type + '<br>' +
                        // '最終更新日時：' + fileVal.lastModifiedDate + '<hr>';
                        alert(fileVal.type);
                }
    $('#info').innerHTML = fileData;
}

function $(id) {
    return document.querySelector(id);
}
            </script>
        </div>
        <div class="rap_buttons">
        <div>
            <input type="button" id="clear" value="消去" onClick="hoge()" />
        </div>
<!--ここから松元変更しました-->

        <div class="hide">
            <?php
            $attributes = array('value' => 'top');
        echo $this->Form->radio('position', $attributes);
        ?></div>
        <!--ここまで松元変更しました-->
        <div style="display:inline-flex">
            <?php echo $this->Form->radio('position',
                [
                    ['value' => 'top', 'text' => '上 　'],
                    ['value' => 'bottom', 'text' => '下']
                ]
            , $attributes,['id' => 'undefine']); ?>
        </div>
            <!-- <input type="radio" name="position" value="top" checked> 画像上
            <input type="radio" name="position" value="bottom">画像下 -->
        <div id=>
            <?php echo $this->Form->button(__('投稿')); ?>
        </div>
    </div>
        <div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</body>
