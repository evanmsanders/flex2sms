<?php $this->set('page_heading', '<div class="page-header">
  <h1>Flex2SMS Dashboard <small>get started</small></h1>
</div>'); ?>
<p>Flex2SMS is system that redirects messages sent via the FLEX paging protocol over the air to SMS messages, emails and other messaging solutions which may be added.  This interface takes care of administration of the system and provides an interface for checking logs.</P>

<div class="row-fluid">
  <div class="span6">
      <p><?php echo $this->Html->link('View Contacts', array('controller' => 'contacts'), array('class' => 'btn')); ?>
          <?php echo $this->Html->link('Add', array('controller' => 'contacts', 'action'=>'add'), array('class' => 'btn btn-mini')); ?></p>
      <p><?php echo $this->Html->link('View Services', array('controller' => 'services'), array('class' => 'btn')); ?>
          <?php echo $this->Html->link('Add', array('controller' => 'services', 'action'=>'add'), array('class' => 'btn btn-mini')); ?></p>
      <p><?php echo $this->Html->link('View SMS log', array('controller' => 'services'), array('class' => 'btn')); ?></p>
      <p><?php echo $this->Html->link('View Scanner', array('controller' => 'scanners'), array('class' => 'btn')); ?></p>
  </div>
  <div class="span6">
      
  </div>
</div>