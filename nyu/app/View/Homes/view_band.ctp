
<div class="col-md-12">
    <div class="col-md-8">
        <?php echo $this->element('search');
        // var_dump($coll_user);
        ?>

        <div class="col-md-12 band_profile">
            <?php
            var_dump($band);
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
            <div class="con_cont">
                <div class="band_banner">
                    <?php
                    $id = 0;
                    foreach($con as $c){
                        echo '<h1>'.$c['Band']['band_name'].' Band Page</h1>';
                        $id = $c['Band']['band_id'];
                    }
                    ?>

                </div>
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

                $left = 0;

                foreach($con as $co){
                    echo '<h3>Concert name: <b>'.$co['Concert']['concert_name'].'</b></h3>';
                    echo '<h3>Concert place: <b>'.$co['Concert']['concert_place'].'</b></h3>';
                    echo '<h3>Ticket price: <b>'.$co['Concert']['concert_ticket_price'].'$</b></h3>';
                    echo '<h3>Concert Date: <b>'.$co['Concert']['concert_creation_date'].'</b></h3>';
                    echo '<h3>Concert Time: <b>'.$co['Concert']['concert_time'].'</b></h3>';
                    echo '<h3>Concert Tickets left: <b>'.$co['Concert']['left'].'</b></h3>';
                    $name = $co['Concert']['concert_name'];
                    $left = $co['Concert']['left'];
                }
                // $get_val = 1;
                /*echo $this->Form->create('Homes', array('action' => 'follow_concert', $get_val));
                echo $this->Form->button('Follow', array('type' => 'submit', 'name' => 'follow', 'class' => 'btn btn-lg btn-success'));
                echo $this->Form->end();*/
                //var_dump($check_follow);
                //echo $this->Html->link('RSVP', array('controller' => 'Homes', 'action' => 'rsvp',$id,$left), array('name' => 'concert','class'=>"btn btn-info"));

                ?>
            </div>
        </div>
        <div class="status">
            <div class="inner_status">
                <?php //var_dump($all_info);
                /*foreach($post as $a){
                    echo '<div class="post">';
                    // echo '<small class="posted"><i>Posted by: '.$a['User']['name'].'</i></small><br/>';
                    echo $a['Post']['post_data'].'<br/>';
                    echo '</div>';
                    // echo '<hr/>';
                }*/
                ?>
            </div>
        </div>

    </div>
    <?php echo $this->element('right'); ?>
</div>

