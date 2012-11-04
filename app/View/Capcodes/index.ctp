<?php $this->set('title_for_layout', 'Capcodes'); ?>
<?php echo $this->Paginator->pagination(); ?>
<div class="row">
    <div class="span6 offset3">
        <table class="table table-striped table-hover table-condensed">
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
                    <td><?php echo $this->Html->link('Edit', array('action' => 'edit', $capcode['Capcode']['id']), array('class' => 'btn btn-small')); ?> 
                        <?php echo $this->Html->link('Delete', array('action' => 'delete', $capcode['Capcode']['id']), array('class' => 'btn btn-small btn-danger'), 'Are you sure you want to delete this code?'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->Paginator->pagination(); ?>
