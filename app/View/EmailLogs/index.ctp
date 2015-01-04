<?php echo $this->Html->script('jquery.prettydate.js'); ?>
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('message'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_id'); ?></th>
			<th><?php echo $this->Paginator->sort('service_id'); ?></th>
			<th><?php echo $this->Paginator->sort('timestamp'); ?></th>
			<th><?php echo $this->Paginator->sort('comments'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($emailLogs as $emailLog): ?>
	<tr>
		<td><?php echo h($emailLog['EmailLog']['email']); ?>&nbsp;</td>
		<td><?php echo h($emailLog['EmailLog']['message']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($emailLog['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $emailLog['Contact']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($emailLog['Service']['name'], array('controller' => 'services', 'action' => 'view', $emailLog['Service']['id'])); ?>
		</td>
		<td><?php echo h($emailLog['EmailLog']['timestamp']); ?>&nbsp;(<span class="date" title="<?php echo(date('c',strtotime($emailLog['EmailLog']['timestamp']))); ?>"><?php echo($emailLog['EmailLog']['timestamp']); ?></span>)</td>
		<td><?php echo h($emailLog['EmailLog']['comments']); ?>&nbsp;</td>
		<td class="actions">
                    <div class="btn-group">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $emailLog['EmailLog']['id']), array('class' => 'btn btn-small btn-info')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $emailLog['EmailLog']['id']), array('class' => 'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', $emailLog['EmailLog']['id'])); ?>
                    </div>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>

<?php echo $this->Paginator->pagination(); ?>

<script>
    $(function() { $("span.date").prettyDate(); });
</script>
