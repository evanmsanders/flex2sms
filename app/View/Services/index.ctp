<?php $this->set('title_for_layout', 'Services'); ?>
<table class="table table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th>Service type</th>
            <th>Service Name</th>
            <th>Capcode/Alias</th>
            <th>Status</th>
            <th>Users/Hits</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($services as $service): ?>
        <tr<?php if($service['Service']['active']!=1){echo(' class="info muted"');} ?>>
            <td><?php switch ($service['Service']['type']) {
                    case 'sms':
                        echo '<i class="icon-signal"></i> ';
                        break;
                    case 'email':
                        echo '<i class="icon-envelope"></i> ';
                        break;
                } 
            echo $service['Service']['type']; ?></td>
            <td><?php echo $service['Service']['name']; ?></td>
            <td><?php echo $this->Html->link($service['Capcode']['code'].' / '.$service['Capcode']['alias'],array('controller'=>'capcodes','action'=>'view',$service['Capcode']['id'])); ?></td>
            <td><?php if($service['Service']['active']==1) { echo 'Active'; } else { echo 'Disabled';} ?></td>
            <td><?php echo count($service['Contact']).' / '.count($service['Message']); ?></td>
            <td><?php echo $this->Html->link('View', array('action' => 'view', $service['Service']['id']), array('class' => 'btn btn-info btn-small')); ?> 
                <?php echo $this->Html->link('Edit', array('action' => 'edit', $service['Service']['id']), array('class' => 'btn btn-small')); ?>
                <?php if($service['Service']['active'] == '1'): ?>
                <?php echo $this->Html->link('Disable', array('action' => 'disable', $service['Service']['id']), array('class' => 'btn btn-small btn-inverse')); ?>
                <?php else: ?>
                <?php echo $this->Html->link('Enable', array('action' => 'enable', $service['Service']['id']), array('class' => 'btn btn-small btn-success')); ?>
                <?php endif; ?>
                <?php echo $this->Html->link('Delete', array('action' => 'delete', $service['Service']['id']), array('class' => 'btn btn-danger btn-small'), 'Are you sure you want to delete this service?'); ?></td>
        </tr>
        <?php endforeach; ?>
	<tr>
		<td colspan="5"></td><td><?php echo $this->Html->link('New Service', array('action' => 'add'), array('class' => 'btn btn-primary')); ?></td>
	</tr>
    </tbody>
</table>
