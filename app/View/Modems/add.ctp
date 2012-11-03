<h1>Add modem</h1>
<p>Add a new modem to the system.  It needs to be set up in gnokii config first, then add it here with the correct device id.</p>
<?php echo $this->Form->create('Modem', array('class'=>'form-horizontal')); ?>
<?php echo $this->Form->input('name',array(
    'placeholder' => 'eg. Modem 1 - 0438560047'
)); ?>
<?php echo $this->Form->input('device'); ?>
<?php echo $this->Form->submit('Create Modem', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
