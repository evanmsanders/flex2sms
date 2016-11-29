<?php echo $this->Html->script('capcode-functions.js'); ?>
<?php $this->set('title_for_layout', 'Edit Contact'); ?>    
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
    
    echo $this->Form->input('pushover_key',array(
        'label' =>  'Pushover User Key:',
        'placeholder' => "u73jgh2csd9o80shq235dfu6yas4se")); 

    echo $this->Form->input('approved_by',array(
        'label' =>  'Approved by:',
        'placeholder' => "Service approved by")); 

    echo $this->Form->input('modem_id',array(
        'label'=> 'Phone:',
        'type'=>'select',
        'options'=>$modems));
    
    echo $this->Form->input('enabled');

    echo $this->Form->input('Service', array('multiple' => 'checkbox')); 
    ?>
</fieldset>
<?php
echo $this->Form->submit('Save Contact', array('class' => 'btn btn-primary')); 
echo $this->Form->end(); 
?>
