<!-- 確認画面 -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.js'></script>

<?php
echo $this->Form->create($article, ['url' => ['controller' => 'articles', 'action' => 'post']]);
if (!empty($id)) {
    echo $this->Form->hidden('id', ['value' => $id]);
}
?>

<body>
<h1>
    <legend>
        <?=  __(h($title));?>
    </legend>
</h1>

<!-- 画像表示（上）（OTSUKI）-->

<?php
if(!empty($upname) && $position == 'top') {
    echo "<div>" . "<a href='/blog/img/". $upname . "' data-lity='data-lity'>";
    echo "<img src='/blog/img/". $upname . "' width='320px' />";
    echo "</a>" . "</div>";
    echo $this->Form->hidden('upfile', ['value' => $upname]);
    echo $this->Form->hidden('position', ['value' => $position]);
}
?>

<div><?= h($body) ?></div>

<!-- 画像表示（下）（OTSUKI）-->
<?php
if(!empty($upname) && $position == 'bottom') {
    echo "<div>" . "<a href='/blog/img/". $upname . "' data-lity='data-lity'>";
    echo "<img src='/blog/img/". $upname . "' width='320px' />";
    echo "</a>" . "</div>";
    echo $this->Form->hidden('upfile', ['value' => $upname]);
    echo $this->Form->hidden('position', ['value' => $position]);
}

?>
<div>

<div>
    <?php echo $this->Form->hidden('title', ['title' => $title]); ?>
    <?php echo $this->Form->hidden('body', ['value' => $body]); ?>
</div>

<div>
    <?php echo $this->Form->button(__('投稿')); ?>
    <?php echo $this->Form->button(__('戻る'), ['name' => 'back']) ?>
    <!-- <input type=button value="back" onclick="history.back();"> -->
    <?php echo $this->Form->end(); ?>
    <FORM>
</FORM>

</div>

</body>
