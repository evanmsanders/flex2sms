<?php echo $this->Form->create('Message');
echo $this->Form->input('number',array(
    'label'=>array('text' => 'Number:',
                   'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'type'=>'select',
    'options'=>$contacts));
 echo $this->Form->textarea('text',array(
    'label' => array('text' => 'Text:',
                    'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'placeholder' => "Text for message")); ?>
<?php echo $this->Form->submit('Send Message', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
