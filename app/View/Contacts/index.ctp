<p><?php echo $this->Html->link('New Contact', array('action' => 'add'), array('class' => 'btn btn-primary')); ?></p>
        <pre><?php print_r($contacts) ?></pre>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Brigade</th>
            <th>Number</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($contacts as $contact): ?>
        <tr>
            <td><?php echo $this->Html->link($brigade['Contacts']['name'], array('action' => 'view', $contact['Contacts']['id'])) ?></td>
            <td><?php echo $this->Html->link($brigade['Brigades']['name'], array('action' => 'view', $contact['Contacts']['brigade'])) ?></td>
            <td><?php echo $contact['Contacts']['number']; ?></td>
            <td><?php echo $contact['Contacts']['email']; ?></td>
            
            <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $brigade['Brigade']['id']), array('class' => 'btn')); ?> 
            <?php echo $this->Html->link('Delete', array('action' => 'delete', $brigade['Brigade']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this Brigade?'); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>