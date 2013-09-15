<?php $this->set('title_for_layout', 'Status'); ?>
<p>Status monitoring log.</p>		
<p><?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></p>
<table class="table table-striped table-hover">
    <thead>
        <tr>
                <th><?php echo $this->BootstrapPaginator->sort('id');?></th>
                <th><?php echo $this->BootstrapPaginator->sort('status');?></th>
                <th><?php echo $this->BootstrapPaginator->sort('timestamp');?></th>
                <th><?php echo $this->BootstrapPaginator->sort('scanner');?></th>
                <th><?php echo $this->BootstrapPaginator->sort('smsdaemon');?></th>
                <th><?php echo $this->BootstrapPaginator->sort('accuracy');?></th>
                <th><?php echo $this->BootstrapPaginator->sort('notes');?></th>
                <th class="actions"><?php echo __('Actions');?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($statuses as $status): ?>
            <tr>
                    <td><?php echo h($status['Status']['id']); ?>&nbsp;</td>
                    <td><?php echo h($status['Status']['status']); ?>&nbsp;</td>
                    <td><?php echo h($status['Status']['timestamp']); ?>&nbsp;</td>
                    <td><?php echo h($status['Status']['scanner']); ?>&nbsp;</td>
                    <td><?php echo h($status['Status']['smsdaemon']); ?>&nbsp;</td>
                    <td><?php echo h($status['Status']['accuracy']); ?>&nbsp;</td>
                    <td><?php echo h($status['Status']['notes']); ?>&nbsp;</td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link('View', array('action' => 'view', $status['Status']['id']), array('class' => 'btn btn-small')); ?>
                        </div>
                    </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>