<table class="table table-striped">
    <thead>
        <tr>
            <th>Contact</th>
            <th>Brigade</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($contacts as $contact): ?>
        <tr>
            <td><?php echo $this->Html->link($contact['Contact']['name'], array('action' => 'view', $contact['Contact']['id'])); ?></td>
            <td><?php echo $this->Html->link($contact['Brigade']['name'], array('controller' => 'brigades', 'action' => 'view', $contact['Brigade']['id'])); ?></td>
            <td><?php echo $this->Html->link('Edit', array('action' => 'edit', $contact['Contact']['id']), array('class' => 'btn')); ?> <?php echo $this->Html->link('Delete', array('action' => 'delete', $contact['Contact']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this contact?'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
