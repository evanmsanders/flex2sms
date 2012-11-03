<?php echo $this->Html->script('capcode-functions.js'); ?>
<h2>Edit Service</h2>
<?php echo $this->Form->create('Service',array('class'=>'form-horizontal')); ?>
<?php echo $this->Form->input('type',array('type'=>'select',
    'options' => array(
        'sms' => 'SMS',
        'email' => 'Email'
    ))); ?>
<?php echo $this->Form->input('capcode_selector', 
            array('id'=>'capcode_selector',
                'value' => $this->request['data']['Capcode']['alias'],
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
<?php echo $this->Form->input('capcode_id',array('type' => 'text','class'=>'hide','label'=>false)); ?>
<?php echo $this->Form->submit('Save Service', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>

 
