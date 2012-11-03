<h1>Brigades</h1>
<p>Click on a brigade name to see more information and members of that brigade.</p>
<div class="row">
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped span6">
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
                <?php echo $this->Html->link('View', array('action' => 'view', $brigade['Brigade']['id']), array('class' => 'btn btn-small btn-info')) ?>
                <?php echo $this->Html->link('Edit', array('action' => 'edit', $brigade['Brigade']['id']), array('class' => 'btn btn-small')); ?> 
                <?php echo $this->Html->link('Delete', array('action' => 'delete', $brigade['Brigade']['id']), array('class' => 'btn btn-small btn-danger'), 'Are you sure you want to delete this Brigade?'); ?>
            </td>
        </tr>
    <?php endforeach; ?>
        <tr>
            <td></td><td><?php echo $this->Html->link('New Brigade', array('action' => 'add'), array('class' => 'btn btn-primary')); ?></td>
        </tr>
    </tbody>
</table>
<?php echo $this->Paginator->pagination(); ?>
</div>