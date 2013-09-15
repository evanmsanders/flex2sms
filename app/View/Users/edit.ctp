<?php $this->set('title_for_layout', 'Edit User'); ?>
<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('username'); ?>
<?php echo $this->Form->input('email'); ?>
<div class="alert alert-warning"><p>Please note:  You must enter a password below, and that is the password which will be saved.</p></div>
<?php echo $this->Form->input('password',array('value' => '')); ?>
<?php echo $this->Form->submit('Save user', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>