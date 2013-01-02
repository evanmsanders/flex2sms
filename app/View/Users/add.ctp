<?php $this->set('title_for_layout', 'Add a User'); ?>
<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('username'); ?>
<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->end('Add User'); ?>
