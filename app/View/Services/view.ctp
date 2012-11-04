<?php $this->set('title_for_layout', 'Service Details'); ?>
<table class="table">
    <thead>
        <tr>
            <th>Service Name</th>
            <th>Comment</th>
            <th>Service Type</th>
            <th>Capcode/Alias</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $service['Service']['name']; ?></td>
            <td><?php echo $service['Service']['comment']; ?></td>
            <td><?php echo $service['Service']['type']; ?></td>
            <td><?php echo $this->Html->link($service['Capcode']['code'].'/'.$service['Capcode']['alias'], array('controller' => 'capcodes', 'action' => 'view', $service['Capcode']['id'])); ?></td>
            <td><?php echo $this->Html->link('Edit', array('action' => 'edit', $service['Service']['id']), array('class' => 'btn')); ?> <?php echo $this->Html->link('Delete', array('action' => 'delete', $service['Service']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this service?'); ?></td>
        </tr>
    </tbody>
</table>
<h2>Contacts</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Contact Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($service['Contact'] as $contact): ?>
        <tr>
        <td><?php echo $this->Html->link($contact['name'], array('controller' => 'contacts', 'action' => 'view', $contact['id'])); ?></td>
            <td>TODO</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h2>Keywords</h2>
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
            <td>TODO</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo Debugger::dump($service); ?>
