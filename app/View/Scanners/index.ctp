<?php echo $this->Html->script('jquery.prettydate.js'); ?>
<?php echo $this->Paginator->pagination(); ?>
    <table class="table table-striped table-hover table-condensed">
    <tr>
        <th><?php echo $this->Paginator->sort('capcode'); ?></th>
        <th><?php echo $this->Paginator->sort('message'); ?></th>
        <th><?php echo $this->Paginator->sort('timestamp'); ?></th>
        <th>Sent</th>
    </tr>
    <?php
    foreach ($scanners as $scanner): ?>
    <tr>
        <td><?php echo h($scanner['Scanner']['capcode']); ?>&nbsp;</td>
        <td><?php echo h($scanner['Scanner']['message']); ?>&nbsp;</td>
        <td><?php echo h($scanner['Scanner']['timestamp']); ?>&nbsp;</td>
        <td class="span2"><span class="date" title="<?php echo(date('c',strtotime($scanner['Scanner']['timestamp']))); ?>">
            <?php echo($scanner['Scanner']['timestamp']); ?></span></td>
    </tr>
<?php endforeach; ?>
	</table>
<?php echo $this->Paginator->pagination(); ?>

<script>
    $(function() { $("span.date").prettyDate(); });
</script>