<h1>Add brigade</h1>
<?php echo $this->Form->create('Brigade',array('class'=>'form-horizontal')); ?>
<?php echo $this->Form->input('name',array(
    'label' => 'Brigade Name:'
    )); ?>
<?php echo $this->Form->submit('Create Brigade', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
