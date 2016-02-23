
<div class="col-md-12">
    <div class="col-md-8">
        <?php echo $this->element('search');
             // var_dump($coll_user);
        ?>

        <div class="col-md-12">

            <div class="status">
                <div class="inner_status">
                    <?php var_dump($trans_m);
                    foreach($coll_user as $a){
                        echo '<div class="post">';
                        $call_id = $a['User']['id'];
                        $call_name = $a['User']['name'];
                        //echo '<small class="posted"><i>Posted by: '.$a['User']['name'].'</i></small><br/>';
                        echo $a['User']['name'].'<br/>';
                        echo $this->Html->link('VIEW PROFILE', array('controller' => 'Homes', 'action' => 'view_profile',$call_id,$call_name ), array('class'=>"btn btn-success"));
                        echo '</div>';
                        // echo '<hr/>';
                    }
                    ?>
                </div>
            </div>
        </div>


    </div>
    <?php echo $this->element('right'); ?>
</div>

