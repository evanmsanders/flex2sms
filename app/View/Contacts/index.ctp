<p></p>
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped table-hover table-condensed">
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
            <td><?php echo $this->Html->link($contact['Brigade']['name'], array('action' => 'view', 'controller'=>'brigades',$contact['Contact']['brigade_id'])) ?></td>
            <td><?php echo $contact['Contact']['number']; ?></td>
            <td><?php echo $contact['Contact']['email']; ?></td>
            
            <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $contact['Contact']['id']), array('class' => 'btn btn-small')); ?> 
            <?php echo $this->Html->link('Delete', array('action' => 'delete', $contact['Contact']['id']), array('class' => 'btn btn-small btn-danger'), 'Are you sure you want to delete this Contact?'); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->Paginator->pagination(); ?>
</table>
<div class="row-fluid">
        <div class="span2 offset8">
            <?php echo $this->Html->link('New Contact', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
    </div>
</div>

