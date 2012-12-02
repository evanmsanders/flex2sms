<table class="table table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th>ID</th>
            <th>Recipient</th>
            <th>Processed date</th>
            <th>Insert date</th>
            <th>Text</th>
            <th>Phone</th>
            <th>Processed</th>
            <th>Error</th>
            <th>D Report</th>
            <th>Not before</th>
            <th>Not after</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo($message['Message']['id']); ?></td>
            <td><?php echo($this->Html->link($message['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $message['Contact']['id'])).' ('.$message['Message']['number'].')'); ?></td>
            <td><?php echo($message['Message']['processed_date']); ?></td>
            <td><?php echo($message['Message']['insertdate']); ?></td>
            <td><?php echo($message['Message']['text']); ?></td>
            <td><?php echo($message['Message']['phone']); ?></td>
            <td><?php echo($message['Message']['processed']); ?></td>
            <td><?php echo($message['Message']['error']); ?></td>
            <td><?php echo($message['Message']['dreport']); ?></td>
            <td><?php echo($message['Message']['not_before']); ?></td>
            <td><?php echo($message['Message']['not_after']); ?></td>
        </tr>
    </tbody>
</table>
<?php echo $this->Html->link('Resend', array('action' => 'resend', $message['Message']['id']), array('class' => 'btn btn-primary')); ?>