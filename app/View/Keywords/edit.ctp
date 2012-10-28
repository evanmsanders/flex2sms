<div class="keywords form">
<?php echo $this->Form->create('Keyword'); ?>
	<fieldset>
		<legend><?php echo __('Edit Keyword'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('word');
		echo $this->Form->input('Service');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Keyword.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Keyword.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Keywords'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
	</ul>
</div>
