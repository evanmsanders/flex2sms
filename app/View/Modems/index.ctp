<?php $this->set('title_for_layout', 'Modems'); ?>
<p>Available modems (phone devices) for sending SMS messages. These must be configured in gnokii for changes to here to have any effect.</p>
<?php echo $this->Html->link('New Modem', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Modem Name</th>
            <th>Device Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($modems as $modem): ?>
        <tr>
            <td><?php echo $this->Html->link($modem['Modem']['name'], array('action' => 'view', $modem['Modem']['id'])); ?></td>
            <td><?php echo $modem['Modem']['device']; ?></td>
            <td>
                <div class="btn-group">
                    <?php echo $this->Html->link('Edit', array('action' => 'edit', $modem['Modem']['id']), array('class' => 'btn btn-small')); ?> 
                    <?php echo $this->Html->link('Delete', array('action' => 'delete', $modem['Modem']['id']), array('class' => 'btn btn-danger btn-small'), 'Are you sure you want to delete this modem?'); ?>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->Html->link('New Modem', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
