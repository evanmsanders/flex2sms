<p><?php echo $this->Html->link('New Contact', array('action' => 'add'), array('class' => 'btn btn-primary')); ?></p>
        
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
            <td><?php echo $this->Html->link($contact['Contact']['name'], array('action' => 'view', $contact['Contact']['id'])) ?></td>
            <td><?php echo $this->Html->link($contact['Brigade']['name'], array('action' => 'view', $contact['Contact']['brigade_id'])) ?></td>
            <td><?php echo $contact['Contact']['number']; ?></td>
            <td><?php echo $contact['Contact']['email']; ?></td>
            
            <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $contact['Contact']['id']), array('class' => 'btn')); ?> 
            <?php echo $this->Html->link('Delete', array('action' => 'delete', $contact['Contact']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this Contact?'); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<pre><?php print_r($contacts) ?></pre>