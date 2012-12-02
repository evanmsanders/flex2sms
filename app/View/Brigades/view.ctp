<?php $this->set('title_for_layout', $brigade['Brigade']['name'].' Brigade'); ?>
<div class="btn-group">
    <?php echo $this->Html->link('New Brigade', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $brigade['Brigade']['id']), array('class' => 'btn')); ?>
    <?php echo $this->Html->link('Delete', array('action' => 'delete', $brigade['Brigade']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this brigade?'); ?>
</div>
<h2>Contacts in this Brigade</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($brigade['Contact'] as $contact): ?>
        <tr>
            <td><?php echo $this->Html->link($contact['name'], array('controller' => 'contacts', 'action' => 'view', $contact['id'])); ?></td>
            <td>
                <div class="btn-group">
                    <?php echo $this->Html->link('Edit', array('controller' => 'contacts', 'action' => 'edit', $contact['id']), array('class' => 'btn btn-small')); ?>
                    <?php echo $this->Html->link('Delete', array('controller' => 'contacts', 'action' => 'delete', $contact['id']), array('class' => 'btn btn-small btn-danger'), 'Are you sure you want to delete this contact?'); ?>
                </div> 
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
