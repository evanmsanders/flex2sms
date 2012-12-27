<?php $this->set('title_for_layout', 'Capcode: '.$capcode['Capcode']['code'].' / '.$capcode['Capcode']['alias']); ?>
<div class="btn-group">
    <?php echo $this->Html->link('New Capcode', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $capcode['Capcode']['id']), array('class' => 'btn')); ?>
    <?php echo $this->Html->link('Delete', array('action' => 'delete', $capcode['Capcode']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this capcode?'); ?>
</div>
<div class="row-fluid">
    <div class="span6">
        <h3>Services</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($capcode['Service'] as $service): ?>
                <tr>
                    <td><?php echo $this->Html->link($service['name'], array('controller' => 'services', 'action' => 'view', $service['id'])); ?></td>
                    <td>
                        <?php if($service['type'] == 'email'): ?>
                            <i class="icon-envelope"></i>
                        <?php else: ?>
                            <i class="icon-phone"></i>
                        <?php endif; ?>
                        <?php echo $service['type']; ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link('Edit', array('controller' => 'services', 'action' => 'edit', $service['id']), array('class' => 'btn')); ?>
                            <?php if($service['active'] == 1): ?>
                            <?php echo $this->Html->link('Disable', array('controller' => 'services', 'action' => 'disable', $service['id']), array('class' => 'btn btn-inverse')); ?>
                            <?php else: ?>
                            <?php echo $this->Html->link('Enable', array('controller' => 'services', 'action' => 'enable'), array('class' => 'btn btn-success')); ?>
                            <?php endif; ?>
                        </div> 
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="span6">
        <h3>Contacts</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($capcode['Service'] as $service): ?>
                <?php foreach($service['Contact'] as $contact): ?>
                <tr>
                    <td><?php echo $this->Html->link($contact['name'], array('controller' => 'contacts', 'action' => 'view', $contact['id'])); ?></td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link('Edit', array('controller' => 'contacts', 'action' => 'edit', $contact['id']), array('class' => 'btn')); ?>
                            <?php if($contact['enabled'] == 1): ?>
                            <?php echo $this->Html->link('Disable', array('controller' => 'contacts', 'action' => 'disable', $contact['id']), array('class' => 'btn btn-inverse')); ?>
                            <?php else: ?>
                            <?php echo $this->Html->link('Enable', array('controller' => 'contacts', 'action' => 'enable', $contact['id']), array('class' => 'btn btn-success')); ?>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <h3>Sent Messages</h3>
        <p>Messages related to this Capcode which have been sent recently.</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Message</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($messages as $message): ?>
                <tr>
                    <td><?php echo $message['outbox']['text']; ?></td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="span6">
        <h3>Scanner Messages</h3>
        <p>All recent message related to this Capcode.</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Message</td>
                </tr> 
            </thead>
            <tbody>
                <?php foreach($scanners as $scanner): ?>
                <tr>
                    <td><?php echo $scanner['Scanner']['message']; ?></td>
                </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div>
</div>
