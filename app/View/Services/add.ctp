<?php echo $this->Html->script('capcode-functions.js'); ?>
<?php $this->set('title_for_layout', 'Add a Service'); ?>
<?php echo $this->Form->create('Service',array('class'=>'form-horizontal')); ?>
<fieldset>
<?php echo $this->Form->input('name',array(
'after' => '<span class="btn btn-small" id="NameAutofill">Autofill</span>')); ?>
<?php echo $this->Form->input('type',array('type'=>'select',
    'options' => array(
        'sms' => 'SMS',
        'email' => 'Email',
        'pushover' => 'Pushover',
        'clickatell' => 'Clickatell',
	'sheets' => 'Google Sheets'
    ))); ?>
<?php echo $this->Form->input('capcode_selector', array(
    'class' => 'capcodeTA',
    'label' => 'Capcode Alias',
    'type' => 'text', 
    'error' => false,
    'data-provide'=>'typeahead', 
    'data-source'=>'[]',
    'autocomplete'=>'off',
    //'after' => '<a href="/flex2sms/capcodes/add" class="to_modal btn btn-small">Add capcode</a>'
));?>

<?php echo $this->Form->input('capcode_id',array(
    'type' => 'text',
    'value' => 0,
    'class' => 'hide',
    'label' => false)); ?>
<?php echo $this->Form->input('comment',array('type'=>'textarea')); ?>

<?php echo $this->Form->input('priority',array('label' => 'Pushover priority (<a href="https://pushover.net/api#priority">?</a>)',
    'type'=>'select',
    'value'=>'0',
    'options' => array(
        '-2' => 'Lowest (-2)',
        '-1' => 'Low (-1)',
        '0' => 'Normal (0)',
        '1' => 'High (1)',
	'2' => 'Emergency (2)'
    ))); ?>
    
<?php echo $this->Form->input('active',array('checked'=>true)); ?>
</fieldset>
<fieldset>
    <legend>Keywords</legend>
    <?php  echo $this->Form->input('filterType', array(
 'label' => 'Filter type:',
 'type' => 'radio',
 'legend' => false,
 'default' => 'disabled',
 'options' => array('disabled' => 'Disabled (no filtering)',
     'and' => 'and (message contains all keywords)',
     'or' => 'or (message contains any key word)')
));  ?>
<?php echo $this->Form->input('Keyword', array('multiple' => 'checkbox')); ?>
</fieldset>
<fieldset>
    <legend>Contacts</legend>
<?php echo $this->Form->input('Contact', array('multiple' => 'checkbox')); ?>
</fieldset>
<?php echo $this->Form->submit('Create Service', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
