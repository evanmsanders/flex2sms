<?php echo $this->Form->create('Keyword'); ?>
    <fieldset>
            <legend>Edit Keyword</legend>
    <?php
            echo $this->Form->input('id');
            echo $this->Form->input('word');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>