<div class="col-md-4 pull-left des_rt">
    <div class="welcome">
        <span class="label label-info"><?php echo 'Welcome '.$name; ?></span>
    </div>
    <div class="settings">
        <h4>SETTINGS</h4>
        <?php
        echo '<div class="set">';
        echo $this->Html->link('EDIT PROFILE', array('controller' => 'Homes', 'action' => 'edit_profile')).'<br/>';
        echo $this->Html->link('EDIT MUSIC TASTE', array('controller' => 'Homes', 'action' => 'music_taste'));
        echo '</div>';

        ?>
    </div>
    <div class="settings">
        <h4>SEARCH YOUR MUSIC</h4>
        <?php
        echo '<div class="set">';
        echo $this->Html->link('SEARCH BY NAME', array('controller' => 'Homes', 'action' => 'search_by_name')).'<br/>';
        echo $this->Html->link('SEARCH BY PLACE', array('controller' => 'Homes', 'action' => 'edit_profile')).'<br/>';
        echo $this->Html->link('SEARCH BY MONTH', array('controller' => 'Homes', 'action' => 'edit_profile'));
        echo '</div>';
        /* echo $this->Form->create('Post', array('class' => 'form'));
         echo $this->Form->input('Search', array('label' => false, 'type' => 'text', 'class' => 'form-control'));
         echo $this->Form->button('Search', array('type' => 'submit', 'class' => 'btn btn-lg btn-success'));
         echo $this->Form->end();*/
        ?>
    </div>
    <div class="settings">
        <h4>YOUR CHOOSED GENERES</h4>
        <?php
        echo '<div class="set">';
            foreach($trans_mus as $tm){
                echo '<div class="pull-left">';
                echo '<span class="label label-success msind">'.$tm.'</span>';
                echo '</div><br/>';
            }
        echo '</div>';
        /* echo $this->Form->create('Post', array('class' => 'form'));
         echo $this->Form->input('Search', array('label' => false, 'type' => 'text', 'class' => 'form-control'));
         echo $this->Form->button('Search', array('type' => 'submit', 'class' => 'btn btn-lg btn-success'));
         echo $this->Form->end();*/
        ?>
    </div>
    <div class="settings">
        <h4>RECOMMENDED CONCERTS</h4>
        <?php
            echo '<div class="set">';
                foreach($concert as $con){
                    echo '<div class="rec_con">';
                    //$name = $con['Concert']['concert_name'];
                    $id = $con['Concert']['concert_id'];
                    $name = $con['Concert']['concert_name'];
                    echo '<b>Concert name: </b><i>'.$con['Concert']['concert_name'].'</i><br/>';
                    echo '<b>Concert place: </b><i>'.$con['Concert']['concert_place'].'</i><br/>';
                    echo $this->Html->link('Vew full info', array('controller' => 'Homes', 'action' => 'view_concert',$id,$name), array('class'=>"btn btn-info"));
                    echo '</div>';
                }
            echo '</div>';
        /* echo $this->Form->create('Post', array('class' => 'form'));
         echo $this->Form->input('Search', array('label' => false, 'type' => 'text', 'class' => 'form-control'));
         echo $this->Form->button('Search', array('type' => 'submit', 'class' => 'btn btn-lg btn-success'));
         echo $this->Form->end();*/
        ?>
    </div>
</div>