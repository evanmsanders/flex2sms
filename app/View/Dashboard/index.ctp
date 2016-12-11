<?php echo $this->Html->script('jquery.prettydate.js'); ?>
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
<?php
/**
 * work out classes for status block
 */
if($statuses[0]['Status']['status'] == 'OK'){
    $status_all = 'success';
} else {
    $status_all = 'warning';
}

if($statuses[0]['Status']['scanner'] == 'Current'){
    $status_scanner = 'success';
} else {
    $status_scanner = 'warning';
}

if($statuses[0]['Status']['smsdaemon'] == 'Running'){
    $status_smsdaemon = 'success';
} elseif($statuses[0]['Status']['smsdaemon'] == 'Python Running'){
    $status_smsdaemon = 'success';
} else {
    $status_smsdaemon = 'warning';
}

if($statuses[0]['Status']['accuracy'] == 20){
    $status_accuracy = 'success';
} elseif ($statuses[0]['Status']['accuracy'] ==19 ){
    $status_accuracy = 'warning';
} else {
    $status_accuracy = 'danger';
}

?>
        
        <div class="row-fluid" style="background-color: #eee; padding:10px; border-radius: 5px;">
            <div class="span12">
                <h4>Self check status :: <span class="text-<?php echo $status_all ?>"><?php echo $statuses[0]['Status']['status']; ?></span><?php echo $this->Html->link('View log', array('controller' => 'statuses'), array('class' => 'btn btn-mini pull-right')); ?></h4>
                <dl class="dl-horizontal">
                    <dt>Last checked:</dt>
                    <dd><span class="date" title="<?php echo date('c',strtotime($statuses[0]['Status']['timestamp'])); ?>"><?php echo $statuses[0]['Status']['timestamp']; ?></span></dd>
                    <dt>Scanner Status:</dt>
                    <dd><span class="text-<?php echo $status_scanner ?>"><?php echo $statuses[0]['Status']['scanner']; ?></span></dd>
                    <dt>SMS Daemon Status:</dt>
                    <dd><span class="text-<?php echo $status_smsdaemon ?>"><?php echo $statuses[0]['Status']['smsdaemon']; ?></span></dd>
                    <dt>Accuracy:</dt>
                    <dd><span class="text-<?php echo $status_accuracy ?>">Received <?php echo $statuses[0]['Status']['accuracy']; ?> out of last 20 periodic test messages.</span></dd>
                    <dt>Notes:</dt>
                    <dd class="text-warning"><?php echo $statuses[0]['Status']['notes']; ?></dd>
                </dl>
            </div>
        </div>
        
        <div class="row-fluid">
              <div class="span6">
                  <h4><i class="fa fa-group fa-lg"></i> Contacts</h4>
                  <p>View and manage contact's details.</p>
                <?php echo $this->Html->link('View Contacts', array('controller' => 'contacts'), array('class' => 'btn btn-primary')); ?>
                <?php echo $this->Html->link('New Contact', array('controller' => 'contacts', 'action'=>'add'), array('class' => 'btn btn-success')); ?>
              </div>
              <div class="span6">
                  <h4><i class="fa fa-cog fa-lg"></i> Services</h4>
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
                  <h4><i class="fa fa-envelope-o fa-lg"></i> <i class="fa fa-list fa-lg"></i> Logs</h4>
                  <p>View SMS and Scanner logs.</p>
                  <p><?php echo $this->Html->link('View SMS log', array('controller' => 'services'), array('class' => 'btn btn-primary')); ?>
                  <?php echo $this->Html->link('View Scanner', array('controller' => 'scanners'), array('class' => 'btn btn-primary')); ?></p>
              </div>
              <div class="span6">
                  <h4><i class="fa fa-user fa-lg"></i> Admin Users</h4>
                  <p>View and manage administrators.</p>
                <?php echo $this->Html->link('View Users', array('controller' => 'users'), array('class' => 'btn btn-primary')); ?>
                <?php echo $this->Html->link('New User', array('controller' => 'users', 'action'=>'add'), array('class' => 'btn btn-success')); ?>
              </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <h4>Recent sent SMS messages <?php echo $this->Html->link('View all', array('controller' => 'messages'), array('class' => 'btn btn-mini pull-right')); ?></h4>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Recipient/Sent</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(count($messages)>0) {
                    foreach($messages as $message): ?>
                <tr<?php if($message['Message']['error']!=0){
            echo(' class="error"');
            }elseif($message['Message']['processed']!=1){ 
                echo(' class="warning"');
                } ?>>
                    <td><?php echo $this->Html->link($message['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $message['Contact']['id'])) ?> <br />
                    <span class="date" title="<?php echo(date('c',strtotime($message['Message']['processed_date']))); ?>"><?php echo($message['Message']['processed_date']); ?></span></td>
                    <td><?php echo $message['Message']['text']; ?></td>
                </tr> 
                <?php endforeach; 
                } else {
                    ?>
                <tr>
                    <td>No messages in SMS outbox</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="span6">
        <h4>Scanner <?php echo $this->Html->link('View all', array('controller' => 'scanners'), array('class' => 'btn btn-mini pull-right')); ?></h4>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Sent</th>
                </tr> 
            </thead>
            <tbody>
                <?php 
                if(count($scanners)>0) {
                foreach($scanners as $scanner): ?>
                <tr>
                    <td><?php echo $scanner['Scanner']['message']; ?></td>
                    <td class="span2"><span class="date" title="<?php echo(date('c',strtotime($scanner['Scanner']['timestamp']))); ?>">
                    <?php echo($scanner['Scanner']['timestamp']); ?></span></td>                
                </tr>
                <?php endforeach; 
                } else {
                    ?>
                <tr>
                    <td>No messages</td>
                </tr>
                <?php
                }
                ?> 
            </tbody>
        </table>
    </div>
</div>


<script>
    $(function() { $("span.date").prettyDate(); });
</script>
