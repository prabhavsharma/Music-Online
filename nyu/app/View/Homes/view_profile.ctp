
<div class="col-md-12">
    <div class="col-md-8">
        <?php echo $this->element('search');
        // var_dump($coll_user);
        ?>

        <div class="col-md-12 genere_profile">
            <?php
                //var_dump($name);
                echo '<h2>'.$name.' loves:'.'</h2><br/>';
                foreach($trans_m as $tm){
                    echo '<span class="label label-success msind">'.$tm.'</span>';
                }
            ?>
        </div>
        <div class="status">
            <div class="inner_status">
                <?php //var_dump($all_info);
                    foreach($post as $a){
                        echo '<div class="post">';
                           // echo '<small class="posted"><i>Posted by: '.$a['User']['name'].'</i></small><br/>';
                            echo $a['Post']['post_data'].'<br/>';
                        echo '</div>';
                        // echo '<hr/>';
                    }
                ?>
            </div>
        </div>

    </div>
    <?php echo $this->element('right'); ?>
</div>

