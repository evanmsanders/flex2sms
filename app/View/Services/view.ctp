<?php $this->set('title_for_layout', 'Service Details'); ?>
<div class="btn-group">
    <?php echo $this->Html->link('New Service', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $service['Service']['id']), array('class' => 'btn')); ?>
    <?php echo $this->Html->link('Delete', array('action' => 'delete', $service['Service']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this service?'); ?>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Service Name</th>
            <th>Comment</th>
            <th>Service Type</th>
            <th>Capcode/Alias</th>
            <th>Status</th>
            <th>Contacts/Hits</th>
        </tr>
    </thead>
    <tbody>
        <tr class="info">
            <td><?php echo $service['Service']['name']; ?></td>
            <td><?php echo $service['Service']['comment']; ?></td>
            <td><?php  switch ($service['Service']['type']) {
                    case 'sms':
                        echo '<i class="icon-signal"></i> ';
                        break;
                    case 'email':
                        echo '<i class="icon-envelope"></i> ';
                        break;
                } 
                echo $service['Service']['type']; ?></td>
            <td><?php echo $this->Html->link($service['Capcode']['code'].' / '.$service['Capcode']['alias'], array('controller' => 'capcodes', 'action' => 'view', $service['Capcode']['id'])); ?></td>
            <td<?php if($service['Service']['active']!=1){echo(' class="text-error"');} ?>><?php if($service['Service']['active']==1) { echo 'Active'; } else { echo '<em class="icon-warning-sign"></em> Disabled';} ?></td>
            <td><?php echo count($service['Contact']).' / '.count($service['Message']); ?></td>
        </tr>
    </tbody>
</table>

<div class="row-fluid">
  <div class="span6">
    <h3>Keywords</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Keyword</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($service['Keyword'] as $keyword): ?>
            <tr>
                <td><?php echo $keyword['word']; ?></td>
                <td>
                    <div class="btn-group">
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'keywords', 'action' => 'edit', $keyword['id']), array('class' => 'btn btn-small')); ?>
                        <span class="btn btn-small btn-danger">TODO: Unlink</span>
                </td>
            </tr>
            <?php endforeach; 
            if(count($service['Keyword']) < 1)
            {
                echo '<tr><td colspan="2">No Keywords</td></tr>';
            }
            ?>
            
        </tbody>
    </table>
  </div>
  <div class="span6">
    <h3>Contacts</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Contact Name</th>
                <th>Brigade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($service['Contact'] as $contact): ?>
            <tr>
            <td><?php echo $this->Html->link($contact['name'], array('controller' => 'contacts', 'action' => 'view', $contact['id'])); ?></td>
            <td><?php echo $contact['Brigade']['name'] ?></td>
            <td>
                <div class="btn-group">
                    <?php echo $this->Html->link('Edit', array('controller' => 'contacts', 'action' => 'edit', $contact['id']), array('class' => 'btn btn-small')); ?> 
                </div>
            </td>
            </tr>
            <?php endforeach; 
            if(count($service['Contact']) < 1)
            {
                echo '<tr><td colspan="2">No Contacts</td></tr>';
            }
            ?>
        </tbody>
    </table>
  </div>
</div>



<h3>Recent messages</h3>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Message</th>
            <th>Sent</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($service['Message'] as $message): ?>
        <tr<?php if($message['error']!=0){
            echo(' class="error"');
            }elseif($message['processed']!=1){
                echo(' class="warning"');
                }  ?>>
            <td><?php echo($message['text']); ?></td>
            <td class="span2"><span class="date" title="<?php echo(date('c',strtotime($message['processed_date']))); ?>"><?php echo($message['processed_date']); ?></span></td>
            <td>
                <div class="btn-group">
                    <?php echo $this->Html->link('Details', array('controller'=>'messages','action' => 'view', $message['id']), array('class' => 'btn btn-small btn-info')); ?>
                    <?php echo $this->Html->link('Resend', array('controller' => 'messages', 'action' => 'resend', $message['id']), array('class' => 'btn btn-small btn-primary')); ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<button type="button" class="btn btn-small pull-right" data-toggle="collapse" data-target="#printr">
  Show array
</button>
<div id="printr" class="collapse">
<?php echo Debugger::dump($service); ?>
</div>
