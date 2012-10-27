<?php echo $this->Form->create('Message',array('class'=>'form-horizontal')); ?>
<?php echo $this->Form->input('number'); ?>
<?php echo $this->Form->input('text',array('type'=>'textarea')); ?>
<?php echo $this->Form->input('proccessed',array('type'=>'select','options'=>array('1','0'))); ?>
<?php echo $this->Form->submit('Save &amp; Resend', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
