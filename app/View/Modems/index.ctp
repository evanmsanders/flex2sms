<table class="table table-striped">
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
            <td><?php echo $this->Html->link('Edit', array('action' => 'edit', $modem['Modem']['id']), array('class' => 'btn')); ?> <?php echo $this->Html->link('Delete', array('action' => 'delete', $modem['Modem']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this modem?'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
