<h3>Create new</h3>
    <?php echo $this->Form->create('Contacts',array('class'=>'form-horizontal')); ?>
<fieldset>
<?php
echo $this->Form->input('name',array(
    'label'=> array('text' => 'Name:',
                   'class' => 'control-label'),
    'placeholder' => "Contact's full name"));

echo $this->Form->input('brigade_id',array(
    'label'=>array('text' => 'Phone:',
                   'class' => 'control-label'),
    'type'=>'select',
    'options'=>$brigades));

echo $this->Form->input('number',array(
    'label' => array('text' => 'Number:',
                    'class' => 'control-label'),
    'placeholder' => "Phone number")); 

echo $this->Form->input('email',array(
    'label' => array('text' => 'Email:',
                    'class' => 'control-label'),
    'placeholder' => "Email address")); 

echo $this->Form->input('approved_by',array(
    'label' => array('text' => 'Approved by:',
                    'class' => 'control-label'),
    'placeholder' => "Service approved by")); 

echo $this->Form->input('modem_id',array(
    'label'=>array('text' => 'Phone:',
                   'class' => 'control-label'),
    'type'=>'select',
    'options'=>$modems));

echo $this->Form->input('default_not_before',array(
    'label' => array('text' => 'Not before:',
                    'class' => 'control-label'),
    'placeholder' => "Default not before")); 

echo $this->Form->input('default_not_after',array(
    'label' => array('text' => 'Not after:',
                    'class' => 'control-label'),
    'placeholder' => "Default not after")); ?>
    </fieldset>
<?php
 echo $this->Form->submit('Create Contact', array('class' => 'btn btn-primary')); 
 echo $this->Form->end(); 
 ?>
