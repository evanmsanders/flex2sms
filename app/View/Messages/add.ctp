<?php echo $this->Form->create('Message'); ?>
<?php echo $this->Form->input('number'); ?>
<?php echo $this->Form->textarea('text'); ?>
<?php echo $this->Form->submit('Send Message', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
