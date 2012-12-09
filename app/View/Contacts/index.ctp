<?php $this->set('title_for_layout', 'Contacts'); ?>
<?php echo $this->Html->link('New Contact', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('name', 'Name'); ?></th>
            <th><?php echo $this->Paginator->sort('Brigade.name', 'Brigade'); ?></th>
            <th>Number</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($contacts as $contact): ?>
        <?php if($contact['Contact']['enabled'] == 1): ?>
        <tr>
        <?php else: ?>
        <tr class="warning">
        <?php endif; ?>
            <td><?php echo $this->Html->link($contact['Contact']['name'], array('action' => 'view', $contact['Contact']['id'])) ?></td>
            <td><?php echo $this->Html->link($contact['Brigade']['name'], array('action' => 'view', 'controller'=>'brigades',$contact['Contact']['brigade_id'])) ?></td>
            <td><?php echo $contact['Contact']['number']; ?></td>
            <td><?php echo $contact['Contact']['email']; ?></td>
            <td><?php  
                if($contact['Contact']['enabled']==1) { 
                    echo 'Active'; 
                } else {
                    echo 'Disabled';
                } 
                if($contact['Contact']['time_prefs_enabled']==1) { 
                    echo ' <i class="icon-time" title="Time management is enabled"></i>'; 
                }
                ?></td>
            <td>
                <div class="btn-group">
                    <?php echo $this->Html->link('Edit', array('action' => 'edit', $contact['Contact']['id']), array('class' => 'btn btn-small')); ?> 
                    <?php if($contact['Contact']['enabled'] == '1'): ?>
                    <?php echo $this->Html->link('Disable', array('action' => 'disable', $contact['Contact']['id']), array('class' => 'btn btn-small btn-inverse')); ?>
                    <?php else: ?>
                    <?php echo $this->Html->link('Enable', array('action' => 'enable', $contact['Contact']['id']), array('class' => 'btn btn-small btn-success')); ?>
                    <?php endif; ?>
                    <?php echo $this->Html->link('Delete', array('action' => 'delete', $contact['Contact']['id']), array('class' => 'btn btn-small btn-danger'), 'Are you sure you want to delete this Contact?'); ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->Html->link('New Contact', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Paginator->pagination(); ?>
</table>
