<?php $this->set('page_heading', '<div class="page-header">
  <h1>Dashboard <small>get started</small></h1>
</div>'); ?>

<div class="row-fluid">
    <div class="span5">
      <div class="hero-unit">
        <h1>Flex2SMS</h1>
        <p>Flex2SMS is system that redirects messages sent via the FLEX paging protocol over the air to SMS messages, emails and other messaging solutions which may be added.  This interface takes care of administration of the system and provides an interface for checking logs.</p>
      </div>
    </div>
    <div class="span6">
        <div class="row-fluid">
              <div class="span6">
                  <h4><i class="icon-group icon-large"></i> Contacts</h4>
                  <p>View and manage contact's details.</p>
                <?php echo $this->Html->link('View Contacts', array('controller' => 'contacts'), array('class' => 'btn btn-primary')); ?>
                <?php echo $this->Html->link('New Contact', array('controller' => 'contacts', 'action'=>'add'), array('class' => 'btn btn-success')); ?>
              </div>
              <div class="span6">
                  <h4><i class="icon-cog icon-large"></i> Services</h4>
                  <p>View and manage services.</p>
                <?php echo $this->Html->link('View Services', array('controller' => 'services'), array('class' => 'btn btn-primary')); ?>
                <?php echo $this->Html->link('New Service', array('controller' => 'services', 'action'=>'add'), array('class' => 'btn btn-success')); ?>
              </div>
        </div>
        <div class="row-fluid">
            <div class="span12"></div>
        </div>
        <div class="row-fluid">
              <div class="span6">
                  <h4><i class="icon-envelope icon-large"></i> SMS Log</h4>
                  <p>SMS message outbox, view sent and pending messages</p>
                  <p><?php echo $this->Html->link('View SMS log', array('controller' => 'services'), array('class' => 'btn btn-primary')); ?></p>
              </div>
              <div class="span6">
                  <h4><i class="icon-list icon-large"></i> Scanner</h4>
                  <p>Raw output from pager scanner</p>
                  <p><?php echo $this->Html->link('View Scanner', array('controller' => 'scanners'), array('class' => 'btn btn-primary')); ?></p>
              </div>
        </div>
    </div>
</div>
<pre>
<?php
?>
</pre>