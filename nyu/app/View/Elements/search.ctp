<div class="row search_bar">
    <div class="col-md-10">
        <?php
        echo $this->Form->create('Homes', array('controller' => 'Home', 'action'=>'search_term'), array('class' => 'form'));
        echo $this->Form->input('search', array('label' => false, 'name' => 'search1', 'class' => 'form-control', 'placeholder' => 'Search your friend to follow'));
        echo '</div>';
        echo '<div class="col-md-2">';
        echo $this->Form->button('Search', array('type' => 'submit','name' => 'search', 'class' => 'btn btn-lg btn-primary'));
        echo $this->Form->end();
        ?>
    </div>
</div>