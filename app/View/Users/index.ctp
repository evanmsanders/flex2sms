<?php $this->set('title_for_layout', 'Users'); ?>
<?php echo $this->Html->link('New User', array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('username'); ?></th>
            <th><?php echo $this->Paginator->sort('email'); ?></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['username']; ?></td>
            <td><?php echo $user['User']['email']; ?></td>
            <td>
                <div class="btn-group">
                    <?php echo $this->Html->link('Edit', array('controller' => 'users', 'action' => 'edit', $user['User']['id']), array('class' => 'btn')); ?>
                    <?php echo $this->Html->link('Delete', array('controller' => 'users', 'action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger'), 'Are you sure you want to delete this user?'); ?>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->Paginator->pagination(); ?>
