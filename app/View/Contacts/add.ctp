<h1>Create new contact</h1>
    <?php echo $this->Form->create('Contacts',array('class'=>'form-horizontal')); 
echo $this->Form->input('name',array(
    'label'=> array('text' => 'Name:',
                   'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'placeholder' => "Contact's full name"));

echo $this->Form->input('brigade',array(
    'label'=>array('text' => 'Phone:',
                   'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'type'=>'select',
    'options'=>$brigades));

echo $this->Form->input('number',array(
    'label' => array('text' => 'Number:',
                    'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'placeholder' => "Phone number")); 

echo $this->Form->input('email',array(
    'label' => array('text' => 'Email:',
                    'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'placeholder' => "Email address")); 

echo $this->Form->input('approved_by',array(
    'label' => array('text' => 'Approved by:',
                    'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'placeholder' => "Service approved by")); 

echo $this->Form->input('modem',array(
    'label'=>array('text' => 'Phone:',
                   'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'type'=>'select',
    'options'=>$modems));

echo $this->Form->input('default_not_before',array(
    'label' => array('text' => 'Not before:',
                    'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'placeholder' => "Default not before")); 

echo $this->Form->input('default_not_after',array(
    'label' => array('text' => 'Not after:',
                    'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'placeholder' => "Default not after")); 
 echo $this->Form->submit('Create Contact', array('class' => 'btn btn-primary')); 
 echo $this->Form->end(); 
 ?>
