<?php $this->set('title_for_layout', 'Services'); ?>
<?php echo $this->Html->link('New Service', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Service type</th>
            <th>Service Name</th>
            <th>Capcode/Alias</th>
            <th>Status</th>
            <th>Users</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($services as $service): ?>
        <?php if($service['Service']['active'] == 1): ?>
        <tr>
        <?php else: ?>
        <tr class="warning">
        <?php endif; ?>
            <td><?php switch ($service['Service']['type']) {
                    case 'sms':
                        echo '<i class="fa fa-phone"></i> ';
                        break;
                    case 'email':
                        echo '<i class="fa fa-envelope-o"></i> ';
                        break;
                    case 'clickatell':
                        echo '<i class="fa fa-dot-circle-o"></i> ';
                        break;
                    case 'pushover':
                        echo '<i class="fa fa-mobile"></i> ';
                        break;
                } 
            echo $service['Service']['type']; ?></td>
            <td><?php echo $this->Html->link($service['Service']['name'], array('action' => 'view', $service['Service']['id'])); ?></td>
            <td><?php echo $this->Html->link($service['Capcode']['code'].' / '.$service['Capcode']['alias'],array('controller'=>'capcodes','action'=>'view',$service['Capcode']['id'])); ?></td>
            <td><?php if($service['Service']['active']==1) { echo 'Active'; } else { echo 'Disabled';} ?></td>
            <td><?php 
            echo count($service['Contact']);
            if($service['Service']['type']=="sms") {
              //  echo ' / '.count($service['Message']); 
            } ?></td>
            <td>
                <div class="btn-group">
                    <?php echo $this->Html->link('Edit', array('action' => 'edit', $service['Service']['id']), array('class' => 'btn btn-small')); ?>
                    <?php if($service['Service']['active'] == '1'): ?>
                    <?php echo $this->Html->link('Disable', array('action' => 'disable', $service['Service']['id']), array('class' => 'btn btn-small btn-inverse')); ?>
                    <?php else: ?>
                    <?php echo $this->Html->link('Enable', array('action' => 'enable', $service['Service']['id']), array('class' => 'btn btn-small btn-success')); ?>
                    <?php endif; ?>
                    <?php echo $this->Html->link('Delete', array('action' => 'delete', $service['Service']['id']), array('class' => 'btn btn-danger btn-small'), 'Are you sure you want to delete this service?'); ?>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->Paginator->pagination(); ?>
<?php echo $this->Html->link('New Service', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
