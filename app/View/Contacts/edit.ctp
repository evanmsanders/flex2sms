<?php echo $this->Form->create('Contact',array('class'=>'form-horizontal')); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('number'); ?>
<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->input('brigade_id'); ?>
<?php echo $this->Form->input('modem_id'); ?>
<?php echo $this->Form->input('default_not_before'); ?>
<?php echo $this->Form->input('default_not_after'); ?>
<?php echo $this->Form->input('approved_by'); ?>
<?php echo $this->Form->submit('Save Contact', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
