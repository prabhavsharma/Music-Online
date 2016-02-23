<div class="col-md-12">

    <div class="col-md-8 pull-left">
        <div class="col-md-12 upper_calling ">
            <h3>EDIT PROFILE</h3>
        </div>
        <div class="border">
            <?php
                echo $this->Form->create('User', array('class' => 'form form-group'));
                echo $this->Form->input('name', array('type' => 'text', 'class' => 'dob form form-control', 'value' => $name));
                echo $this->Form->input('place', array('type' => 'text', 'class' => 'dob form form-control', 'value' => $place));
                echo $this->Form->input('country', array('type' => 'text', 'class' => 'dob form form-control', 'value' => $country));
                echo '</br>';
                echo $this->Form->button('UPDATE INFO', array('type' => 'submit', 'class' => 'btn btn-lg btn-success'));
            ?>
        </div>
    </div>
    <?php echo $this->element('right'); ?>
</div>