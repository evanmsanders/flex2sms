<?php $this->set('title_for_layout', 'Edit Brigade'); ?>
<?php echo $this->Form->create('Brigade'); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->submit('Save Brigade', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
