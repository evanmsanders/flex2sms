<?php $this->set('title_for_layout', 'Contacts'); ?>
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('name', 'Name'); ?></th>
            <th><?php echo $this->Paginator->sort('name', 'Brigade'); ?></th>
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
            <?php echo $this->Html->link('View', array('action' => 'view', $contact['Contact']['id']), array('class' => 'btn btn-small btn-info')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $contact['Contact']['id']), array('class' => 'btn btn-small')); ?> 
            <?php echo $this->Html->link('Delete', array('action' => 'delete', $contact['Contact']['id']), array('class' => 'btn btn-small btn-danger'), 'Are you sure you want to delete this Contact?'); ?>
            </td>
        </tr>
    <?php endforeach; ?>
        <tr>
            <td colspan="4"></td><td><?php echo $this->Html->link('New Contact', array('action' => 'add'), array('class' => 'btn btn-primary')); ?></td>
        </tr>
    </tbody>
</table>
<?php echo $this->Paginator->pagination(); ?>
</table>

<button type="button" class="btn btn-small" data-toggle="collapse" data-target="#printr">
  Show array
</button>
<div id="printr" class="collapse">
    <pre><?php print_r($contacts); ?></pre>
</div>
