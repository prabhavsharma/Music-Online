<div class="row search_bar">
    <div class="col-md-10">
        <?php
        echo $this->Form->create('Homes', array('controller' => 'Home', 'action'=>'search_by_name'), array('class' => 'form'));
        echo $this->Form->input('search', array('label' => false, 'name' => 'search1', 'class' => 'form-control', 'placeholder' => 'Search your friend to follow'));
        echo '</div>';
        echo '<div class="col-md-2">';
        echo $this->Form->button('Search', array('type' => 'submit','name' => 'search', 'class' => 'btn btn-lg btn-primary'));
        echo $this->Form->end();
        ?>
    </div>
    <div class="status">
        <div class="inner_status">
            <?php //var_dump($trans_m);
            foreach($coll_user as $a){
                echo '<div class="post">';
                $id = $a['Band']['band_id'];
                $name = $a['Band']['band_name'];
                //echo '<small class="posted"><i>Posted by: '.$a['User']['name'].'</i></small><br/>';
                echo $a['Band']['band_name'].'<br/>';
                echo $this->Html->link('VIEW BAND', array('controller' => 'Homes', 'action' => 'view_band',$id,$name ), array('class'=>"btn btn-success"));
                echo '</div>';
                // echo '<hr/>';
            }
            ?>
        </div>
    </div>
</div>