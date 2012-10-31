<h2>New keyword</h2>
<?php echo $this->Form->create('Keyword',array('class'=>'form-horizontal')); ?>
<fieldset>
    <legend>Add a keyword</legend>
<?php echo $this->Form->input('word'); ?>
</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
