<?php $this->set('title_for_layout', 'Add Contact'); ?>    
<?php echo $this->Form->create('Contact',array('class'=>'form-horizontal')); ?>
<fieldset>
    <legend>Contact details</legend>
    <?php
    echo $this->Form->input('name',array(
        'label'=>  'Name:',
        'placeholder' => "Contact's full name"));

    echo $this->Form->input('brigade_id',array(
        'label'=> 'Phone:',
        'type'=>'select',
        'options'=>$brigades));

    echo $this->Form->input('number',array(
        'label' =>  'Number:',
        'placeholder' => "Phone number")); 

    echo $this->Form->input('email',array(
        'label' =>  'Email:',
        'placeholder' => "Email address")); 

    echo $this->Form->input('approved_by',array(
        'label' =>  'Approved by:',
        'placeholder' => "Service approved by")); 

    echo $this->Form->input('modem_id',array(
        'label'=> 'Phone:',
        'type'=>'select',
        'options'=>$modems));

    echo $this->Form->input('time_prefs_enabled', array(
        'label' => 'Time Preferences Enabled:'
    ));

    echo $this->Form->input('default_not_before',array(
        'label' =>  'Not before:',
        'placeholder' => "Default not before",
        'timeFormat' => '24',
        'interval' => '15',
        'class' => 'input-mini'
    )); 

    echo $this->Form->input('default_not_after',array(
        'label' =>  'Not after:',
        'placeholder' => "Default not after",
        'timeFormat' => '24',
        'interval' => '15',
        'class' => 'input-mini'
    ));

    echo $this->Form->input('enabled');

    echo $this->Form->input('Service', array('multiple' => 'checkbox'));
?>
</fieldset>
<?php
 echo $this->Form->submit('Create Contact', array('class' => 'btn btn-primary')); 
 echo $this->Form->end(); 
 ?>
