<?php $this->set('title_for_layout', 'Modem Details'); ?>
<div class="btn-group">
    <?php echo $this->Html->link('New Modem', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $modem['Modem']['id']), array('class' => 'btn')); ?>
    <?php echo $this->Html->link('Delete', array('action' => 'delete', $modem['Modem']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this modem?'); ?>
</div>
    <p>TODO</p>
