<h2>Create new service</h2>
<?php echo $this->Form->create('Service',array('class'=>'form-horizontal')); ?>
<?php echo $this->Form->input('type',array('type'=>'select',
    'options' => array(
        'sms' => 'SMS',
        'email' => 'Email'
    ))); ?>
<?php echo $this->Form->input('capcode_selector', 
            array('id'=>'capcode_selector',
                'class' => 'capcodeTA',
                'label' => 'Capcode Alias',
                'type' => 'text', 
                'error' => false,
                'data-provide'=>'typeahead', 
                'data-source'=>'[]',
                'autocomplete'=>'off'));?>
<?php echo $this->Form->input('comment',array('type'=>'textarea')); ?>
<?php echo $this->Form->input('keywords'); ?>
<?php echo $this->Form->input('active',array('type'=>'select',
        'options' => array(
            '1' => 'Active',
            '0' => 'Disabled'
        ))); ?>
<?php echo $this->Form->input('capcode_id',array('type' => 'text','value'=>0,'class'=>'hide','label'=>false)); ?>
<?php echo $this->Form->submit('Create Service', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
