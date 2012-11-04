<h2>Add capcode</h2>
<?php echo $this->Form->create('Capcode',array('class'=>'form-horizontal')); ?>
<?php echo $this->Form->input('code'); ?>
<?php echo $this->Form->input('alias'); ?>
<?php echo $this->Form->submit('Create Code', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
