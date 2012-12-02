<?php $this->set('title_for_layout', 'Capcode Details'); ?>
<div class="btn-group">
    <?php echo $this->Html->link('New Capcode', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $capcode['Capcode']['id']), array('class' => 'btn')); ?>
    <?php echo $this->Html->link('Delete', array('action' => 'delete', $capcode['Capcode']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this capcode?'); ?>
</div>
<p>TODO</p>
