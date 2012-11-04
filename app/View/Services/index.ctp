<h2>Services</h2>
<table class="table table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th>Service type</th>
            <th>Capcode/Alias</th>
            <th>Comments</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($services as $service): ?>
        <tr<?php if($service['Service']['active']!=1){echo(' class="warning"');} ?>>
            <td><?php echo $service['Service']['type']; ?></td>
            <td><?php echo $this->Html->link($service['Capcode']['alias'].' / '.$service['Capcode']['code'],array('controller'=>'capcodes','action'=>'view',$service['Capcode']['id'])); ?></td>
            <td><?php echo $service['Service']['comment']; ?></td>
            <td><?php if($service['Service']['active']==1) { echo 'Active'; } else { echo 'Disabled';} ?></td>
            <td><?php echo $this->Html->link('Edit', array('action' => 'edit', $service['Service']['id']), array('class' => 'btn')); ?> 
                <?php echo $this->Html->link('Delete', array('action' => 'delete', $service['Service']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this service?'); ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4"></td>
            <td><?php echo $this->Html->link('New Service', array('action' => 'add'), array('class' => 'btn btn-primary')); ?></td>
        </tr>
    </tbody>
</table>
