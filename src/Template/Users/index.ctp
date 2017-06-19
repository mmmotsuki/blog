<!-- <form action="login" id="userslogin" method="get" accept-charset="utf-8">
    <div>
       <div><label class="lavel">ユーザーネーム</label></div>
       <div><input type="text" name="name" placeholder="ユーザーネーム" value=""maxlength="10" pattern="^\S+$" required></div>
   </div>
   <div>
       <div><label class="lavel">パスワード</label></div>
       <div><input type="text" name="pass" placeholder="パスワード" value=""maxlength="10" pattern="^\S+$" required></div>
   </div> -->

   <?= $this->Form->create(null,['url'=>['controller'=>'users','action'=>'login']]);?>
   <?= $this->Form->input('name');?>
   <?= $this->Form->input('pass');?>
   <?= $this->Form->button('ログイン') ?>

<!-- </form> -->
