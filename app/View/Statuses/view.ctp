<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Status');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($status['Status']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Status'); ?></dt>
			<dd>
				<?php echo h($status['Status']['status']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Timestamp'); ?></dt>
			<dd>
				<?php echo h($status['Status']['timestamp']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Scanner'); ?></dt>
			<dd>
				<?php echo h($status['Status']['scanner']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Smsdaemon'); ?></dt>
			<dd>
				<?php echo h($status['Status']['smsdaemon']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Accuracy'); ?></dt>
			<dd>
				<?php echo h($status['Status']['accuracy']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Notes'); ?></dt>
			<dd>
				<?php echo h($status['Status']['notes']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Statuses')), array('action' => 'index')); ?> </li>
		</ul>
		</div>
	</div>
</div>

