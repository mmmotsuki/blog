
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.js'></script>

<h2>
    <fieldset>
        <legend>
            <?=  __(h($article->title)); ?>
            <!-- ログイン時のみ記事編集ボタン表示 -->
            <?php if(!empty( $auth )) {
                echo "<div>" . $this->Html->link('編集', ['action' => 'add', $article->id],['id' => 'buttonright']) . "</div>";
            }
            ?>
        </legend>
</h2>

<div class="container">
    <!-- 画像表示（上）-->
    <?php
    if($article->position == 'top') {
        echo "<div>" . "<a href='/blog/img/". $article->upfile . "' data-lity='data-lity'>";
        echo "<img src='/blog/img/". $article->upfile . "' width='320px' />";
        echo "</a>" . "</div>";
    }
    ?>

    <div><?= h($article->body) ?></div>

    <!-- 画像表示（下）-->
    <?php
    if($article->position == 'bottom') {
        echo "<div>" .  "<a href='/blog/img/". $article->upfile . "' data-lity='data-lity'>";
        echo "<img src='/blog/img/". $article->upfile . "' width='320px' />";
        echo "</a>" . "</div>";
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
</div>
</fieldset>

<fieldset>
    <legend>
        <?= __('Please enter your name , comment and password'); ?>
    </legend>
    <form action="../addcomment" method="post">
        <div>
            <span style='font-weight:bold'>Name</span> <span style='color:#c3232d'>*</span>
            <input type="text" name="name" maxlength="10" required>
        </div>
        <div>
            <span style='font-weight:bold'>Comment</span> <span style='color:#c3232d'>*</span>
            <textarea name="body" rows="5" maxlength="400" required></textarea>
        </div>
        <div>
            <span style='font-weight:bold'>Password</span> <span style='color:#c3232d'>*</span>
            <input type="password" name="pass" value=""maxlength="10" required>
        </div>
        <div class="button1">
            <?php
            echo "<input type='hidden' name='articles_id' value=" . $article->id . ">";
            echo $this->Form->submit('投稿',['id' => 'buttonright']);
            ?>
        </div>
    </form>
</fieldset>

<table border-collapse='collapse'>
    <?php
    $no = 1;
    //var_dump($article->comments[6]->body);
    //comments(小文字のcでcomments)はcakePHPで定義されている文言
    foreach($article->comments as $a):
        echo "<div class='commentbox'>";
        echo "<td width='70'>No. " . $no . "</td>";
        echo "<td colspan='3'>name: " . $a->name . "</td>";
        echo "</div>";
        echo "<tr>";
        echo "<td colspan='4'>" . $a->body . "</td>";
        echo "</tr>";
        // echo "<td>パスワード:" . $a->pass . "</td>";
        echo "<tr border-bottom='1px'>";
        echo "<td colspan='2'>Created:" . $a->created->format(DATE_RFC850) . "</td>";
        echo "<td>";
        if ($a->created->format(DATE_RFC850) !== $a->modified->format(DATE_RFC850)) {
            echo "Edited:" . $a->modified->format(DATE_RFC850);
        }
        echo "</td>";
        $no++;
    ?>
        <td>
            <!-- ↓ id="clear" を解除 -->
            <input type="button" id="commentedit" value="編集" onClick="password(<?= $a->id ?>, '<?= $a->pass ?>', <?= $no ?>)">
            <!-- <a href="javascript:void(0)" onkClick="javascript:password(<?= $a->id ?>, '<?=$a->pass?>'); return false;">編集</a> -->
        </td>
    </tr>
    <tr><td colspan='4'><Hr></td></tr>
    <?php endforeach?>
</table>


<script type="text/javascript">


function password(id, pass, no){
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

        var no = document.createElement('input');
        no.setAttribute('type', 'hidden');
        no.setAttribute('name', 'no');
        no.setAttribute('value', no);

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

</script>

</div>
</form>
