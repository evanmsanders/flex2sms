<?php echo $this->Form->create('Service',array('class'=>'form-horizontal')); ?>
<?php echo $this->Form->input('contact_id'); ?>
<?php echo $this->Form->input('capcode_id',array(
    'type' => 'text',
    'data-provide' => 'typeahead'
    )); ?>
<?php echo $this->Form->input('comment',array('type'=>'textarea')); ?>
<?php echo $this->Form->submit('Create Service', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
 
<script type='text/javascript'>
var codes_array = [<?php
foreach($capcodes as $id=>$alias)
{
   echo "'$alias',";
}
// echo "var capcodes_array = ". json_encode($capcodes) . ";\n";
?>''];
$('#ServiceCapcodeId').typeahead({source: capcodes_array});
</script>
<pre><?php //print_r($capcodes) ?></pre>