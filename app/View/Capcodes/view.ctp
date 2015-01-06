<?php echo $this->Html->script('jquery.prettydate.js'); ?>
<?php $this->set('title_for_layout', 'Capcode: '.$capcode['Capcode']['code'].' / '.$capcode['Capcode']['alias']); ?>
<div class="btn-group">
    <?php echo $this->Html->link('New Capcode', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $capcode['Capcode']['id']), array('class' => 'btn')); ?>
    <?php echo $this->Html->link('Delete', array('action' => 'delete', $capcode['Capcode']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this capcode?'); ?>
</div>
<div class="row-fluid">
    <div class="span6">
        <h3>Services</h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(count($capcode['Service'])>0){
                    foreach($capcode['Service'] as $service){
                ?>
                <tr>
                    <td><?php echo $this->Html->link($service['name'], array('controller' => 'services', 'action' => 'view', $service['id'])); ?></td>
                    <td>
                        <?php if($service['type'] == 'email'): ?>
                            <i class="fa fa-envelope-o"></i>
                        <?php else: ?>
                            <i class="fa fa-phone"></i>
                        <?php endif; ?>
                        <?php echo $service['type']; ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link('Edit', array('controller' => 'services', 'action' => 'edit', $service['id']), array('class' => 'btn btn-small')); ?>
                            <?php if($service['active'] == 1): ?>
                            <?php echo $this->Html->link('Disable', array('controller' => 'services', 'action' => 'disable', $service['id']), array('class' => 'btn btn-inverse btn-small')); ?>
                            <?php else: ?>
                            <?php echo $this->Html->link('Enable', array('controller' => 'services', 'action' => 'enable'), array('class' => 'btn btn-success btn-small')); ?>
                            <?php endif; ?>
                        </div> 
                    </td>
                </tr>
                <?php 
                    }
                } else { 
                    ?>
                <tr>
                    <td colspan="3">No services use this code</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="span6">
        <h3>Contacts</h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($capcode['Service'])>0){ ?>
                <?php foreach($capcode['Service'] as $service): ?>
                <?php foreach($service['Contact'] as $contact): ?>
                <tr<?php if($contact['enabled'] != 1){
                    echo(' class="warning"');
                } ?>>
                    <td><?php echo $this->Html->link($contact['name'], array('controller' => 'contacts', 'action' => 'view', $contact['id'])); ?></td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link('Edit', array('controller' => 'contacts', 'action' => 'edit', $contact['id']), array('class' => 'btn btn-small')); ?>
                            <?php if($contact['enabled'] == 1): ?>
                            <?php echo $this->Html->link('Disable', array('controller' => 'contacts', 'action' => 'disable', $contact['id']), array('class' => 'btn btn-inverse btn-small')); ?>
                            <?php else: ?>
                            <?php echo $this->Html->link('Enable', array('controller' => 'contacts', 'action' => 'enable', $contact['id']), array('class' => 'btn btn-success btn-small')); ?>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endforeach; 
                } else {
                    ?>
                <tr>
                    <td colspan="2">No contacts receive messages from this capcode.</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <h3>Sent Messages <small>Recent sent messages related to this Capcode</small></h3>
        
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Message <?php echo $this->Html->link('View all', array('controller' => 'messages'), array('class' => 'btn btn-mini pull-right')); ?></th>
                </tr>
            </thead>
            <tbody
                <?php 
                if(count($messages)>0) {
                    foreach($messages as $message): ?>
                <tr<?php if($message['outbox']['error']!=0){
            echo(' class="error"');
            }elseif($message['outbox']['processed']!=1){ 
                echo(' class="warning"');
                } ?>>
                    <td><strong><span class="date" title="<?php echo(date('c',strtotime($message['outbox']['processed_date']))); ?>">
                    <?php echo($message['outbox']['processed_date']); ?></span></strong> - <?php echo $message['outbox']['text']; ?></td>
                </tr> 
                <?php endforeach; 
                } else {
                    ?>
                <tr>
                    <td>No messages have been sent from this capcode</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="span6">
        <h3>Scanner Messages <small>All recent message related to this Capcode.</small></h3>
        
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Message <?php echo $this->Html->link('View all', array('controller' => 'scanners'), array('class' => 'btn btn-mini pull-right')); ?></th>
                </tr> 
            </thead>
            <tbody>
                <?php 
                if(count($scanners)>0) {
                foreach($scanners as $scanner): ?>
                <tr>
                    <td><strong><span class="date" title="<?php echo(date('c',strtotime($scanner['Scanner']['timestamp']))); ?>">
                    <?php echo($scanner['Scanner']['timestamp']); ?></span></strong> - <?php echo $scanner['Scanner']['message']; ?></td>
                </tr>
                <?php endforeach; 
                } else {
                    ?>
                <tr>
                    <td>No messages have been sent from this capcode</td>
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