<div class="emailLogs view">
<h2><?php  echo __('Email Log'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($emailLog['EmailLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($emailLog['EmailLog']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($emailLog['EmailLog']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo $this->Html->link($emailLog['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $emailLog['Contact']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($emailLog['Service']['name'], array('controller' => 'services', 'action' => 'view', $emailLog['Service']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timestamp'); ?></dt>
		<dd>
			<?php echo h($emailLog['EmailLog']['timestamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($emailLog['EmailLog']['comments']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Email Log'), array('action' => 'edit', $emailLog['EmailLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Email Log'), array('action' => 'delete', $emailLog['EmailLog']['id']), null, __('Are you sure you want to delete # %s?', $emailLog['EmailLog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Email Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email Log'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
	</ul>
</div>
