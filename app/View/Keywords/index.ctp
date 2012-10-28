<h2>Keywords</h2>
<table class="table table-striped table-hover table-condensed">
<tr>
    <th><?php echo $this->Paginator->sort('id'); ?></th>
    <th><?php echo $this->Paginator->sort('word'); ?></th>
    <th class="actions">Actions</th>
</tr>
<?php
foreach ($keywords as $keyword): ?>
<tr>
    <td><?php echo h($keyword['Keyword']['id']); ?>&nbsp;</td>
    <td><?php echo h($keyword['Keyword']['word']); ?>&nbsp;</td>
    <td class="actions">
        <?php echo $this->Html->link(__('View'), array('action' => 'view', $keyword['Keyword']['id']), array('class' => 'btn btn-small')); ?>
        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $keyword['Keyword']['id']), array('class' => 'btn btn-small')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $keyword['Keyword']['id']), array('class' => 'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', $keyword['Keyword']['id'])); ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

