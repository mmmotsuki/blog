<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<h1>Articles top</h1>
<table>
        <td><input type="text" name="namae" placeholder="記事のタイトル" value=""maxlength="10" pattern="^\S+$" required></td></br>
</table>
<table>
        <textarea name="content" rows="5" placeholder="記事の本文" maxlength="400"></textarea>
</table>
<table>
<th class=th2><div class="button1">
            	<input type="submit" value="画像" />
            </div></th>
<th class=th2><div class="button1">
                <input type="submit" value="削除" />
            </div></th>
</table>
<table>
<td><input type="text" name="namae" placeholder="画像ファイル" value=""maxlength="10"></td>
</table>
<table>
<td>
    <input type="radio" name="sex" value="guest"> 画像上
    <input type="radio" name="sex" value="admin"checked>画像下
</td>
</table>
<table>
<th class=th2><div class="button1">
            <input type="submit" value="投稿" />
            </div></th>
</table>
