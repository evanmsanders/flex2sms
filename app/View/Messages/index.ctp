<table class="table table-striped">
    <thead>
        <tr>
            <th>Recipient</th>
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
            <td><?php echo($message['Message']['number']); ?></td>
            <td><?php echo($message['Message']['text']); ?></td>
            <td><?php echo($message['Message']['processed_date']); ?></td>
            <td><?php echo $this->Html->link('View', array('action' => 'view', $message['Message']['id']), array('class' => 'btn')) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
