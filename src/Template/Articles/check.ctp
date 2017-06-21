<div class="container">
<h1>確認画面です</h1>

<div>
    <div><input type="text" name="namae" placeholder="記事のタイトル" value=""maxlength="10" pattern="^\S+$" required></div></br>
</div>
<div>
    <input type="text" name="namae" placeholder="画像ファイル上" value=""maxlength="10">
</div>
<div>
    <textarea name="content" rows="5" placeholder="記事の本文" maxlength="400"></textarea>
</div>
<div>
    <input type="text" name="namae" placeholder="画像ファイル下" value=""maxlength="10">
</div>

<u>
    <?php echo $this->Form->button(__('戻る')); ?>
</u>
<u>
    <?php echo $this->Form->button(__('完了')); ?>
</u>
</div>
