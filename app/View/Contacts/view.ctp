<h3><?php echo($contact['Contact']['name']."'s information"); ?></h3>
<dl class="dl-horizontal">
  <dt>Name:</dt>
  <dd><?php echo($contact['Contact']['name']); ?></dd>
  
  <dt>Phone Number:</dt>
  <dd><?php echo($contact['Contact']['number']); ?></dd>
  
  <dt>Email address:</dt>
  <dd><?php echo($contact['Contact']['email']); ?></dd>
    
  <dt>Approved by:</dt>
  <dd><?php echo($contact['Contact']['approved_by']); ?></dd>
  
  <dt>Member of:</dt>
  <dd><?php echo($contact['Brigade']['name']); ?> brigade</dd>
  
  <dt>Default times:</dt>
  <dd>Only message between </strong><?php echo($contact['Contact']['default_not_before']); ?> and <?php echo($contact['Contact']['default_not_after']); ?></dd>
  
  <dt>Send messages from:</dt>
  <dd><?php echo($contact['Modem']['name']); ?></dd>

  <dt></dt>
  <dd><?php echo $this->Html->link('Edit', array('action' => 'edit', $contact['Contact']['id']), array('class' => 'btn')); ?></dd>
      

</dl>

<h3><?php echo($contact['Contact']['name']); ?> has <?php echo(count($contact['Service'])); ?> services</h3>
<table class="table table-striped table-hover table-condensed">
    <thead>
        <th>Type</th>
        <th>Capcode</th>
        <th>Comment</th>
        <th>Status</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach($contact['Service'] as $service): ?>
        <tr<?php if($service['active']!=1){echo(' class="warning"');} ?>>
            <td><?php echo $service['type']; ?></td>
            <td><?php echo $service['capcode_id'].'/'.$this->Html->link($service['capcode_id'],array('controller'=>'Capcode','action'=>'view',$service['capcode_id'])); ?></td>
            <td><?php echo $service['comment']; ?></td>
            <td><?php if($service['active']==1) { echo 'Active'; } else { echo 'Disabled';} ?></td>
            <td><?php echo $this->Html->link('Edit', array('controller'=>'Service','action' => 'edit', $service['id']), array('class' => 'btn')); ?> 
                <?php echo $this->Html->link('Delete', array('controller'=>'Service','action' => 'delete', $service['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this service?'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="row-fluid">
        <div class="span2 offset8">
            <?php echo $this->Html->link('New Service', array('action' => 'add', 'controller' => 'Services'), array('class' => 'btn btn-success')); ?>
    </div>
</div>

<button type="button" class="btn btn-small" data-toggle="collapse" data-target="#printr">
  Show array
</button>
<div id="printr" class="collapse">
    <pre><?php print_r($contact); ?></pre>
</div>

