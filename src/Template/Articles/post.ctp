<!-- File: src/Template/Articles/add.ctp -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.js'></script>

<head>
</head>
<body>

    <div class="container">
        <h1>編集画面</h1>
        <div>
            <?php echo $this->Form->create($article, array('url' => array('controller' => 'articles', 'action' => 'check'), 'type' => 'file')); ?>
        </div>
        <div>
            <?php echo $this->Form->control('title'); ?><!--titleいじるとアラートでなくなる-->
        </div>
        <div>
            <?php echo $this->Form->control('body', ['rows' => '3'],['id' =>'textsize']); ?><!--bodyいじるとアラートでなくなる-->
        </div>
        <!-- <div id="special">
             <?php echo $this->Form->file('upfile', array('accept' => "image/jpeg, image/png")); ?>
        </div> -->
<!-- 
        <?php
        if(!empty($article->upfile)) {
            echo "<div>" . "<a href='/blog/img/". $article->upfile . "' data-lity='data-lity'>";
            echo "<img src='/blog/img/". $article->upfile . "' width='320px' />";
            echo "</a>" . "</div>";
        }
        ?> -->

        <div>
            <?php echo $this->Form->file('upfile', array('id' => 'file1', 'accept' => "image/jpeg, image/png")); ?>
            <script type="text/javascript" language="javascript">
                function hoge() {
                    var dom = document.getElementById('add_radio');
                    document.getElementById("file1").value="";
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
        $('#file1').on("change", function() {
            var file = this.files[0];
            var dom = document.getElementById('add_radio');
            var f_value = document.getElementById('file1');
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
        <div class="rap_buttons">
        <div>
            <input type="button" id="clear" value="消去" onClick="hoge()" />
        </div>



        <div>
            <?php echo $this->Form->button(__('確認'), ['id' => 'add_post']); ?>
        </div>
    </div>
        <div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</body>
