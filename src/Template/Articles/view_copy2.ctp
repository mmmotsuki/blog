<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.js'></script>
<?php
    echo "<a href='/blog/img/". $article->upfile . "' data-lity='data-lity'>";
    echo "<img src='/blog/img/". $article->upfile . "' width='320px' />";
    echo "</a>";
?>

<h1><?= h($article->title) ?></h1>
<!-- ログイン時のみ記事編集ボタン表示 (OTSUKI) -->
<?php if(!empty( $auth )) {
    echo "<div id=right1>" . $this->Html->link('編集', ['action' => 'add', $article->id]) . "</div>";
}
?>

<!-- 画像表示（上）（OTSUKI）-->
<?php
if($article->position == 'top') {
    echo "<div>" . $this->Html->image($article->upfile) . "</div>";
}
?>

<div><?= h($article->body) ?></div>

<!-- 画像表示（下）（OTSUKI）-->
<?php
if($article->position == 'bottom') {
    echo "<div>" . $this->Html->image($article->upfile) . "</div>";
}
?>

<div><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></div>
<div>
    <?php
    if($article->created->format(DATE_RFC850) !== $article->modified->format(DATE_RFC850)) {
        echo "<small>Edited:" . $article->modified->format(DATE_RFC850) . "</small>";
    }
    ?>
</div>

<form action="../addcomment" method="post">
    <div>
        <div><input type="text" name="name" placeholder="コメント投稿者名" value=""maxlength="10" required></div>
        <div><input type="password" name="pass" placeholder="コメントのパスワード" value=""maxlength="10" required></div>
    </div>
    <div class="button1">
        <textarea name="body" rows="5" placeholder="コメントの本文" maxlength="400" required></textarea>
        <?php
        $id = $article->id;
        echo "<input type='hidden' name='articles_id' value=" . $id . ">";
        ?>
            <?=$this->Form->submit('投稿')?>
    </div>
</form>

<table border="1">
    <?php
    $no = 1;
    //var_dump($article->comments[6]->body);
    //comments(小文字のcでcomments)はcakePHPで定義されている文言
    foreach($article->comments as $a):
        echo "<tr>";
        echo "<td>No. " . $no . "</td>";
        echo "<td>名前:" . $a->name . "</td>";
        echo "<td>コメント内容:" . $a->body . "</td>";
        echo "<td>パスワード:" . $a->pass . "</td>";
        echo "<td>投稿日時:" . $a->created . "</td>";
        $no++;
    ?>
    <!-- <form action="../editcomment" method="post"> -->
    <!-- <?= $this->Form->button('編集', ['action'=>'../editcomment', 'method'=>'post', 'onClick'=>"password(<?= $a->id ?>, '<?=$a->pass?>')"]) ?> -->
    <td>
        <input type="button" value="編集" onClick="password(<?= $a->id ?>, '<?=$a->pass?>')">
    </td>
    </tr>
    <?php endforeach?>
</table>


<script type="text/javascript">
<!--

function password(id, pass){
	p = window.prompt("パスワードを入力してください", "");

	if(p == pass) {
        var form = document.createElement('form');

        form.setAttribute('action', '../editcomment/' + id);
        form.setAttribute('method', 'post');
        document.body.appendChild(form);

        var id = document.createElement('input');
        id.setAttribute('type', 'hidden');
        id.setAttribute('name', 'id');
        id.setAttribute('value', id);

        var pass = document.createElement('input');
        pass.setAttribute('type', 'hidden');
        pass.setAttribute('name', 'pass');
        pass.setAttribute('value', pass);

        // form.appendChild(input);
        form.submit();
	}
	else if(p != "" && p != null) {
		window.alert(pass + 'パスワードが違います');
	}
	else {
		window.alert('キャンセルされました');
	}
}

// -->
</script>

</div>
</form>
