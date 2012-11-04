<?php $this->set('title_for_layout', 'Edit Modem'); ?>
<?php echo $this->Form->create('Modem'); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('device'); ?>
<?php echo $this->Form->submit('Save Modem', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
