<div class="clickatellLogs view">
<h2><?php  echo __('Clickatell Log'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clickatellLog['ClickatellLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Capcode'); ?></dt>
		<dd>
			<?php echo h($clickatellLog['ClickatellLog']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($clickatellLog['ClickatellLog']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clickatellLog['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $clickatellLog['Contact']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clickatellLog['Service']['name'], array('controller' => 'services', 'action' => 'view', $clickatellLog['Service']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timestamp'); ?></dt>
		<dd>
			<?php echo h($clickatellLog['ClickatellLog']['timestamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($clickatellLog['ClickatellLog']['comments']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

