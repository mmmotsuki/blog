<div class="users form">
<?php echo $this->Flash->render(); ?>
<?php echo $this->Form->create(); ?>
    <fieldset>
        <legend>
            <?= __('Please enter your username and password'); ?>
        </legend>
        <?= $this->Form->control('username', ['maxlength' => '50', 'required' => 'required']); ?>
        <?= $this->Form->control('password', ['maxlength' => '255', 'required' => 'required']); ?>
    </fieldset>
    <?= $this->Form->button(__('Login'))?>
<?= $this->Form->end(); ?>
</div>
