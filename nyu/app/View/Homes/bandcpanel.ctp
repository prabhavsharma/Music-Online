
<div class="col-md-12">
    <div class="col-md-8">
        <?php //echo $this->element('search');
        // var_dump($coll_user);
        ?>

        <div class="col-md-12 band_profile">
            <?php

            foreach($band as $tm){
                echo '<h2>'.$tm['Band']['band_name'].'</h2><br/>';

                $band_id = $tm['Band']['band_id'];
            }
            if($check_follow == NULL){
                //echo $this->Html->link('FOLLOW', array('controller' => 'Homes', 'action' => 'follow_concert',$id,$name), array('name' => 'concert','class'=>"btn btn-info"));
                echo $this->Html->link('BECOME FAN', array('controller' => 'Homes', 'action' => 'fan',$band_id), array('name' => 'fan','class'=>"btn btn-info"));

            }else{
                echo '<span class="label label-success msind">YOU ALREADY FOLLOWED THIS CONCERT PAGE</span>';
            }
                //echo '<span class="label label-success msind">'.$tm.'</span>';

            ?>
        </div>
        <div class="col-md-12">
            <?php
            echo $this->Form->create('Bandstatus', array('class' => 'form'));
            echo $this->Form->input('band_status', array('type' => 'textarea', 'class' => 'form-control'));
            echo $this->Form->button('POST', array('type' => 'submit','name' => 'submit', 'class' => 'btn btn-lg btn-success'));
            ?>
        </div>
        <div class="col-md-12">
            <?php

            ?>
        </div>
        <div class="status">
            <div class="inner_status">
                <?php //var_dump($all_info);
                foreach($bandst as $a){
                    echo '<div class="post">';
                    // echo '<small class="posted"><i>Posted by: '.$a['User']['name'].'</i></small><br/>';
                    echo $a['BandStatus']['band_status'].'<br/>';
                    echo '<div class="post_bar">';
                    //echo '<small class="posted pull-left"><i>Posted by: '.$a['User']['name'].'</i></small> |';
                    echo '<small class="posted pull-left"><i> Posted on: '.$a['BandStatus']['date'].'</i></small><br/>';
                    echo '</div>';
                    echo '</div>';
                    // echo '<hr/>';
                }
                ?>
            </div>
        </div>

    </div>
    <?php echo $this->element('right'); ?>
</div>

