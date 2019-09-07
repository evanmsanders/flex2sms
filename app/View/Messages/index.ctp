<?php echo $this->Html->script('jquery.prettydate.js'); ?>
<p>Messages sent via SMS.  Sent time is time processed, not the time of page.</p>
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped table-hover table-bordered">
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
            <td class="span2"><span class="date" title="<?php echo(date('c',strtotime($message['Message']['insertdate']))); ?>"><?php echo($message['Message']['insertdate']); ?></span></td>
            <td>
                <div class="btn-group">
                    <?php echo $this->Html->link('Details', array('action' => 'view', $message['Message']['id']), array('class' => 'btn btn-small btn-info')); ?>
                    <?php if($message['Message']['processed']==1) {
                        echo $this->Html->link('Resend', array('action' => 'resend', $message['Message']['id']), array('class' => 'btn btn-small btn-primary')); 
                    } else {
                        echo $this->Html->link('Cancel', array('action' => 'cancel', $message['Message']['id']), array('class' => 'btn btn-small btn-warning'));
                    }
                      ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->Paginator->pagination(); ?>

<script>
    $(function() { $("span.date").prettyDate(); });
</script>
