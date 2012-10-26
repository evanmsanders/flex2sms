<table class="table table-striped">
    <thead>
        <tr>
            <th>Capcode</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($capcodes as $capcode): ?>
        <tr>
            <td><?php echo $this->Html->link($capcode['Capcode']['code'], array('action' => 'view', $capcode['Capcode']['id'])); ?></td>
            <td><?php echo $this->Html->link('Edit', array('action' => 'edit', $capcode['Capcode']['id']), array('class' => 'btn')); ?> <?php echo $this->Html->link('Delete', array('action' => 'delete', $capcode['Capcode']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this code?'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
