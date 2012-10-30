<h3>Create new</h3>
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

echo $this->Form->input('default_not_before',array(
    'label' =>  'Not before:',
    'placeholder' => "Default not before")); 

echo $this->Form->input('default_not_after',array(
    'label' =>  'Not after:',
    'placeholder' => "Default not after")); ?>
    </fieldset>
<?php
 echo $this->Form->submit('Create Contact', array('class' => 'btn btn-primary')); 
 echo $this->Form->end(); 
 ?>
