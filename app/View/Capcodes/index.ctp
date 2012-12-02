<?php $this->set('title_for_layout', 'Capcodes'); ?>
<?php echo $this->Html->link('New Capcode', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Alias</th>
            <th>Capcode</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($capcodes as $capcode): ?>
        <tr>
            <td><?php echo $this->Html->link($capcode['Capcode']['alias'], array('action' => 'view', $capcode['Capcode']['id'])); ?></td>
            <td><?php echo $capcode['Capcode']['code']; ?></td>
            <td>
                <div class="btn-group">
                    <?php echo $this->Html->link('Edit', array('action' => 'edit', $capcode['Capcode']['id']), array('class' => 'btn btn-small')); ?> 
                    <?php echo $this->Html->link('Delete', array('action' => 'delete', $capcode['Capcode']['id']), array('class' => 'btn btn-small btn-danger'), 'Are you sure you want to delete this code?'); ?>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->Html->link('New Capcode', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Paginator->pagination(); ?>
