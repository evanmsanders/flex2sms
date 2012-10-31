<p><?php echo $this->Html->link('New Brigade', array('action' => 'add'), array('class' => 'btn btn-primary')); ?></p>
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Brigade</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($brigades as $brigade): ?>
        <tr>
            <td><?php echo $this->Html->link($brigade['Brigade']['name'], array('action' => 'view', $brigade['Brigade']['id'])) ?></td>
            <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $brigade['Brigade']['id']), array('class' => 'btn')); ?> <?php echo $this->Html->link('Delete', array('action' => 'delete', $brigade['Brigade']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this Brigade?'); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->Paginator->pagination(); ?>