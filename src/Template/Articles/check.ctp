<!-- 確認画面 -->

<?php
echo $this->Form->create($article, ['url' => ['controller' => 'articles', 'action' => 'add']]);
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
    echo "<div>" . $this->Html->image($upname) . "</div>";
    echo $this->Form->hidden('upfile', ['value' => $upname]);
    echo $this->Form->hidden('position', ['value' => $position]);
}
?>

<div><?= h($body) ?></div>

<!-- 画像表示（下）（OTSUKI）-->
<?php
if(!empty($upname) && $position == 'bottom') {
    echo "<div>" . $this->Html->image($upname) . "</div>";
    echo $this->Form->hidden('upfile', ['value' => $upname]);
    echo $this->Form->hidden('position', ['value' => $position]);
}
?>
<div>

<div>
    <?php echo $this->Form->hidden('title', ['title' => $title]); ?><!--titleいじるとアラートでなくなる-->
    <?php echo $this->Form->hidden('body', ['value' => $body]); ?><!--bodyいじるとアラートでなくなる-->
</div>

<div>
    <?php echo $this->Form->button(__('投稿')); ?>
    <input type=button value="back" onclick="history.back();">
    <?php echo $this->Form->end(); ?>
</div>

</body>
