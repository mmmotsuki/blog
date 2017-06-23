

<h1><?= h($article->title) ?></h1>
<!-- ログイン時のみ記事編集ボタン表示 (OTSUKI) -->
<?php if(!empty( $auth )) {
    echo "<div>" . $this->Html->link('編集', ['action' => 'add', $article->id]) . "</div>";
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
<<<<<<< HEAD
        document.body.appendChild(form);
        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'pass');
        input.setAttribute('value', id);
        form.appendChild(input);
        var flag = document.createElement('flag');
        flag.setAttribute('type', 'hidden');
        flag.setAttribute('name', 'pass');//表示しないならいらない
        flag.setAttribute('value', id);
        form.appendChild(input);
=======
>>>>>>> 322082b665967f7f81f1537a57c7bb30e7455e05
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
