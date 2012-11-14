<?php echo $this->Html->script('capcode-functions.js'); ?>
<?php $this->set('title_for_layout', 'Add a Service'); ?>
<?php echo $this->Form->create('Service',array('class'=>'form-horizontal')); ?>
<?php echo $this->Form->input('name',array(
'after' => '<span class="btn btn-small" id="NameAutofill">Autofill</span>')); ?>
<?php echo $this->Form->input('type',array('type'=>'select',
    'options' => array(
        'sms' => 'SMS',
        'email' => 'Email'
    ))); ?>
<?php echo $this->Form->input('capcode_selector', 
            array('class' => 'capcodeTA',
                'label' => 'Capcode Alias',
                'type' => 'text', 
                'error' => false,
                'data-provide'=>'typeahead', 
                'data-source'=>'[]',
                'autocomplete'=>'off',
                'after' => '<a href="/flex2sms/capcodes/add" class="to_modal btn btn-small">Add capcode</a>'));?>

<?php echo $this->Form->input('capcode_id',array(
    'type' => 'text',
    'value' => 0,
    'class' => 'hide',
    'label' => false)); ?>
<?php echo $this->Form->input('comment',array('type'=>'textarea')); ?>
<?php echo $this->Form->input('active',array('type'=>'select',
        'options' => array(
            '1' => 'Active',
            '0' => 'Disabled'
        ))); ?>
<?php echo $this->Form->input('Keyword', array('multiple' => 'checkbox')); ?>
<?php echo $this->Form->input('Contact', array('multiple' => 'checkbox')); ?>
<?php echo $this->Form->submit('Create Service', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
