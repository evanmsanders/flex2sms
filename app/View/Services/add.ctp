<?php echo $this->Form->create('Service',array('class'=>'form-horizontal')); ?>
<?php echo $this->Form->input('contact'); ?>
<?php echo $this->Form->input('type',array('type'=>'select',
    'options' => array(
        'sms' => 'SMS',
        'email' => 'Email'
    ))); ?>
<?php echo $this->Form->input('capcode_selector', 
            array('id'=>'capcode_selector',
                'label' => 'Capcode Alias',
                'type' => 'text', 
                'error' => false,
                'data-provide'=>'typeahead', 
                'data-source'=>'[]',
                'autocomplete'=>'off'));?>
<?php echo $this->Form->input('comment',array('type'=>'textarea')); ?>
<?php echo $this->Form->input('active',array('type'=>'select',
        'options' => array(
            '1' => 'Active',
            '0' => 'Disabled'
        ))); ?>
<?php echo $this->Form->input('capcode_id',array('type' => 'text','value'=>0,'class'=>'hide','label'=>false)); ?>
<?php echo $this->Form->submit('Create Service', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
 
<script type='text/javascript'>
    $(document).ready(function(){
        $('#capcode_selector').typeahead({
                    source: function(typeahead, query) {
                        $.ajax({
                            url: "/flex2sms/Capcodes/ajax_findAlias/",
                            dataType: "json",
                            type: "POST",
                            data: {search_key: query},
                            success: function(data) {
                                var return_list = [], i = data.length;
                                    while (i--) {
                                    return_list[i] = {id: data[i].id, value: data[i].alias};
                                    }
                            typeahead.process(return_list);
                            }
                        });
                    },
            onselect: function(obj) {
            $('input[id="ServiceCapcodeId"]').val(obj.id);
        }
    });
});
</script>
