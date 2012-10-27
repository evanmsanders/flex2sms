<?php echo $this->Form->create('Message');
echo $this->Form->input('number',array(
    'label'=> 'Number:',
    'type'=>'select',
    'options'=>$contacts));
 echo $this->Form->textarea('text',array(
    'label' => 'Text:',
    'placeholder' => "Text for message")); ?>
<?php echo $this->Form->submit('Send Message', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
