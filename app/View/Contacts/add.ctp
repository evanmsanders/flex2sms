<h1>Create new contact</h1>
    <?php echo $this->Form->create('Contacts',array('class'=>'form-horizontal')); ?>
    <?php echo $this->Form->input('name',array(
        'before' => '<div class="control-group">',   
        'between' => '<div class="controls">',  
        'after' => '        </div>
    </div>' )); ?>
    
        <label class="control-label" for="name">Name:</label>
        
            <input id="name" name="name" type="text" placeholder="Contact's full name." value=""/>

    <div class="control-group">
        <label class="control-label" for="brigade">Brigade: </label>
        <div class="controls">
            <input id="brigade" name="brigade" type="text" placeholder="Home station" value=""/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="number">Number: </label>
        <div class="controls">
            <input id="number" name="number"  type="text" placeholder="Phone number" value=""/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="email">Email: </label>
        <div class="controls">
            <input id="email" name="email"  type="text" placeholder="Email" value=""/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="phone">Phone: </label>
        <div class="controls">
            <select id="phone" name="phone">
                <option value="1" >1</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="appby">Approved by: </label>
        <div class="controls">
            <input id="appby" name="approved_by"  type="text" placeholder="Service approved by" value=""/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="not_before">Not before: </label>
        <div class="controls">
            <input id="not_before" name="not_before" type="text" placeholder="Default not before" value=""/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="not_after">Not after: </label>
        <div class="controls">
            <input id="not_after" name="not_after" type="text" placeholder="Default not after" value=""/>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input id="submit" type="submit" name="submit" value="Create" />
        </div>
    </div>
</form>


<?php echo $this->Form->submit('Create Brigade', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
