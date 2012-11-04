<?php $this->set('title_for_layout', 'Services'); ?>
<p><?php echo $this->Html->link('New Service', array('action' => 'add'), array('class' => 'btn btn-primary')); ?></p>
<table class="table table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th>Comment</th>
            <th>Service type</th>
            <th>Capcode/Alias</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($services as $service): ?>
        <tr<?php if($service['Service']['active']!=1){echo(' class="warning"');} ?>>
            <td><?php echo $service['Service']['comment']; ?></td>
            <td><?php switch ($service['Service']['type']) {
                    case 'sms':
                        echo '<i class="icon-signal"></i> ';
                        break;
                    case 'email':
                        echo '<i class="icon-envelope"></i> ';
                        break;
                } 
            echo $service['Service']['type']; ?></td>
            <td><?php echo $this->Html->link($service['Capcode']['code'].' / '.$service['Capcode']['alias'],array('controller'=>'capcodes','action'=>'view',$service['Capcode']['id'])); ?></td>
            <td><?php if($service['Service']['active']==1) { echo 'Active'; } else { echo 'Disabled';} ?></td>
            <td><?php echo $this->Html->link('View', array('action' => 'view', $service['Service']['id']), array('class' => 'btn btn-info')); ?> <?php echo $this->Html->link('Edit', array('action' => 'edit', $service['Service']['id']), array('class' => 'btn')); ?> <?php echo $this->Html->link('Delete', array('action' => 'delete', $service['Service']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this service?'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
