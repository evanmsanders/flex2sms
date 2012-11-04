<?php $this->set('title_for_layout', 'Edit Capcode'); ?>
<?php echo $this->Form->create('Capcode',array('class'=>'form-horizontal')); 

echo $this->Form->input('alias',array(
    'label'=> array('text' => 'Alias:',
                   'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'placeholder' => "Capcode Alias"));

echo $this->Form->input('code',array(
    'label'=> array('text' => 'Capcode:',
                   'class' => 'control-label'),
    'before' => '<div class="control-group">',   
    'between' => '<div class="controls">',  
    'after' => '</div></div>',
    'placeholder' => "Capcode"));?>

<?php echo $this->Form->submit('Save Code', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
