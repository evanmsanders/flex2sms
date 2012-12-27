<?php echo $this->Html->script('jquery.prettydate.js'); ?>
<?php $this->set('title_for_layout', 'Contact Details'); ?>
<div class="btn-group">
    <?php echo $this->Html->link('New Contact', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $contact['Contact']['id']), array('class' => 'btn')); ?>
    <?php if($contact['Contact']['enabled'] == 1): ?>
    <?php echo $this->Html->link('Disable', array('action' => 'disable', $contact['Contact']['id']), array('class' => 'btn btn-inverse')); ?>
    <?php else: ?>
    <?php echo $this->Html->link('Enable', array('action' => 'enable', $contact['Contact']['id']), array('class' => 'btn btn-success')); ?>
    <?php endif; ?>
    <?php echo $this->Html->link('Delete', array('action' => 'delete', $contact['Contact']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this contact?'); ?>
</div>
<div class="row-fluid">
  <div class="span6">
    <h3>Information</h3>
    <dl class="dl-horizontal">
        <dt>Name:</dt>
        <dd><?php echo($contact['Contact']['name']); ?></dd>

        <dt>Phone Number:</dt>
        <dd><?php echo($contact['Contact']['number']); ?></dd>

        <dt>Email address:</dt>'])>
        <dd><?php echo($contact['Contact']['email']); ?></dd>

        <dt>Approved by:</dt>
        <dd><?php echo($contact['Contact']['approved_by']); ?></dd>

        <dt>Member of:</dt>
        <dd><?php echo($contact['Brigade']['name']); ?> brigade</dd>

        <dt>Default times:</dt>
        <dd>Only message between </strong><?php echo($contact['Contact']['default_not_before']); ?> and <?php echo($contact['Contact']['default_not_after']); ?> (Time preferences <b><?php echo ($contact['Contact']['time_prefs_enabled'] ? 'enabled' : 'disabled'); ?>)</b></dd>

        <dt>Send messages from:</dt>
        <dd><?php echo($contact['Modem']['name']); ?></dd>

        <dt>Contact Enabled:</dt>
        <dd><?php echo ($contact['Contact']['enabled'] ? 'Yes' : 'No'); ?>

        <dt>Subscribed to: </dt>
        <dd><?php if(is_array($contact['Service'])){ 
            echo count($contact['Service']); 
            } 
            else { 
                echo '0';
                } ?> services</dd>
    </dl>
  </div>
  <div class="span6">
    <h3>Services</h3>
    <table class="table table-striped table-hover">
        <thead>
            <th>Type</th>
            <th>Name</th>
            <th>Status</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach($contact['Service'] as $service): ?>
            <tr<?php if($service['active']!=1){echo(' class="warning"');} ?>>
            <td><?php switch ($service['type']) {
    case 'sms':
        echo '<i class="icon-phone"></i> ';
        break;
    case 'email':
        echo '<i class="icon-envelope"></i> ';
        break;
            }
    echo $service['type']; ?></td>
                <td><?php echo $this->Html->link($service['name'],array('controller'=>'services','action'=>'view',$service['id'])); ?></td>
                <td><?php if($service['active']==1) { echo 'Active'; } else { echo 'Disabled';} ?></td>
                <td>
                    <div class="btn-group">
                        <?php echo $this->Html->link('Edit', array('controller'=>'services','action' => 'edit', $service['id']), array('class' => 'btn btn-small')); ?> 
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
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
    <?php foreach($contact['Message'] as $message): ?>
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
                    <?php if($message['processed']==1) {
                        echo $this->Html->link('Resend', array('controller' => 'messages', 'action' => 'resend', $message['id']), array('class' => 'btn btn-small btn-primary'));
                    } else {
                        echo $this->Html->link('Cancel', array('controller' => 'messages', 'action' => 'cancel', $message['id']), array('class' => 'btn btn-small btn-warning')); 
                    }
                    ?>
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
    <pre><?php print_r($contact); ?></pre>
</div>

<script>
    $(function() { $("span.date").prettyDate(); });
</script>
