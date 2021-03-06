<!-- File: src/Template/Articles/add.ctp -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.js'></script>

<head>
    <?php
    if ($article->id == null) {
        echo '<h1>新規投稿</h1>';
    }
    else {
        echo '<h1>記事編集</h1>';
    }
    ?>
</head>

<body>
    <div class="container">
         </div>
        <div>
            <?php echo $this->Form->create($article, array('url' => array('controller' => 'articles', 'action' => 'check'), 'type' => 'file')); ?>
        </div>
        <div>
            <?php echo $this->Form->control('title'); ?><!--titleいじるとアラートでなくなる-->
        </div>
        <div>
            <?php echo $this->Form->control('body', ['rows' => '3']); ?><!--bodyいじるとアラートでなくなる-->
        </div>
        <!-- <div id="special">
             <?php echo $this->Form->file('upfile', array('accept' => "image/jpeg, image/png")); ?>
        </div> -->

        <?php
        if(!empty($article->upfile)) {
            // echo "<div>" . "<a href='/blog/img/". $article->upfile . "' data-lity='data-lity'>";
            // echo "<img src='/blog/img/". $article->upfile . "' width='320px' />";
            // echo "</a>" . "</div>";
        }
        ?>
        <div>

            <?php echo $this->Form->file('upfile', array('id' => 'choicefile', 'accept' => "image/jpeg, image/jpg, image/png")); ?>
            <script type="text/javascript" language="javascript">
                function hoge() {
                    var dom = document.getElementById('add_radio');
                    document.getElementById("choicefile").value="";
                    dom.style.display = "none";
                }

            </script>

            <script type="text/javascript" language="javascript">

$('#file1')[0].files[0];


var name = $('#file1')[0].files[0].name;
console.log(name);
</script>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
    $(function() {
        $('#choicefile').on("change", function() {
            var file = this.files[0];
            var dom = document.getElementById('add_radio');
            var f_value = document.getElementById('choicefile');
            if(file != null) {
                // alert('世界の中心で愛を叫ぶ'); // ファイル名をログに出力する
                dom.style.display = "";
            }

            if(!f_value.value){
                dom.style.display = "none";
            }
        });
    });
</script>
        </div>
    <div class="rap_buttons">
        <div class="hide">
            <?php
            $attributes = array('value' => 'top');
        echo $this->Form->radio('position', $attributes);
        ?></div>

        <div id="add_radio" style="display:none;">
            <?php echo $this->Form->radio('position',
                [
                    ['value' => 'top', 'text' => '上 　'],
                    ['value' => 'bottom', 'text' => '下']
                ]
            , $attributes,['id' => 'add_clear']); ?>
        </div>
    </div>

        <div>
            <input type="button" id="buttonclear" value="画像取消" onClick="hoge()" />
        </div>


    <div class="rap_buttons">
        <div>
            <?php echo $this->Form->button(__('確認'), ['id' => 'add_post']); ?>
        </div>
    </div>
        <div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</body>
