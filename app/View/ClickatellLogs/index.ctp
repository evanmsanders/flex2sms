<?php echo $this->Html->script('jquery.prettydate.js'); ?>
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('number'); ?></th>
            <th><?php echo $this->Paginator->sort('message'); ?></th>
            <th><?php echo $this->Paginator->sort('contact_id'); ?></th>
            <th><?php echo $this->Paginator->sort('service_id'); ?></th>
            <th><?php echo $this->Paginator->sort('timestamp'); ?></th>
            <th><?php echo $this->Paginator->sort('comments'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
	<?php foreach ($clickatellLogs as $clickatellLog): ?>
	<tr>
		<td><?php echo h($clickatellLog['ClickatellLog']['number']); ?>&nbsp;</td>
		<td><?php echo h($clickatellLog['ClickatellLog']['message']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clickatellLog['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $clickatellLog['Contact']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($clickatellLog['Service']['name'], array('controller' => 'services', 'action' => 'view', $clickatellLog['Service']['id'])); ?>
		</td>
		<td><?php echo h($clickatellLog['ClickatellLog']['timestamp']); ?>&nbsp; (<span class="date" title="<?php echo(date('c',strtotime($clickatellLog['ClickatellLog']['timestamp']))); ?>"><?php echo($clickatellLog['ClickatellLog']['timestamp']); ?></span>)</td>
		<td><?php echo h($clickatellLog['ClickatellLog']['comments']); ?>&nbsp;</td>
		<td class="actions">
                    <div class="btn-group">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $clickatellLog['ClickatellLog']['id']), array('class' => 'btn btn-small btn-info')); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clickatellLog['ClickatellLog']['id']), array('class' => 'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', $clickatellLog['ClickatellLog']['id'])); ?>
                    </div>
		</td>
	</tr>
<?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->Paginator->pagination(); ?>

<script>
    $(function() { $("span.date").prettyDate(); });
</script>
