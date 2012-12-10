<?php echo $this->Html->script('jquery.prettydate.js'); ?>
<?php echo $this->Paginator->pagination(); ?>
<table class="table table-striped table-hover tabled-condensed">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('capcode'); ?></th>
            <th><?php echo $this->Paginator->sort('message'); ?></th>
            <th><?php echo $this->Paginator->sort('timestamp'); ?></th>
        </tr>
    </thead>
        <tbody>
        <?php foreach ($scanners as $scanner): ?>
        <tr>
            <td><?php echo h($scanner['Scanner']['capcode']); ?>&nbsp;</td>
            <td><em><?php echo h($scanner['Scanner']['timestamp']); ?></em> - <?php echo h($scanner['Scanner']['message']); ?>&nbsp;</td>
            <td class="span2"><span class="date" title="<?php echo(date('c',strtotime($scanner['Scanner']['timestamp']))); ?>">
                <?php echo($scanner['Scanner']['timestamp']); ?></span></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->Paginator->pagination(); ?>

<script>
    $(function() { $("span.date").prettyDate(); });
</script>
