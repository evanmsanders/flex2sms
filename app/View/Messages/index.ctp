<?php echo $this->Html->script('jquery.prettydate.js'); ?>
<h1>Message log</h1>
<p>Messages sent via SMS.  Sent time is time processed, not the time of page.</p>
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th>Recipient</th>
            <th>Service</th>
            <th>Message</th>
            <th>Sent</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($messages as $message): ?>
        <tr<?php if($message['Message']['error']!=0){
            echo(' class="error"');
            }elseif($message['Message']['processed']!=1){ 
                echo(' class="warning"');
                } ?>>
            <td><?php echo $this->Html->link($message['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $message['Contact']['id'])) ?></td>
            <td><?php echo $this->Html->link($message['Service']['name'], array('controller' => 'services', 'action' => 'view', $message['Service']['id'])); ?></td>
            <td><?php echo($message['Message']['text']); ?></td>
            <td class="span2"><span class="date" title="<?php echo(date('c',strtotime($message['Message']['processed_date']))); ?>"><?php echo($message['Message']['processed_date']); ?></span></td>
            <td><?php echo $this->Html->link('View', array('action' => 'view', $message['Message']['id']), array('class' => 'btn btn-small')) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->Paginator->pagination(); ?>
<?php Debugger::dump($messages); ?>

<script>
    $(function() { $("span.date").prettyDate(); });
</script>