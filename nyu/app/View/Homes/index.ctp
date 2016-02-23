
    <div class="col-md-12">
        <div class="col-md-8">
            <?php echo $this->element('search');
               // var_dump($coll_user);
            ?>

            <div class="col-md-12">
                <?php
                    echo $this->Form->create('Post', array('class' => 'form'));
                    echo $this->Form->input('post_data', array('type' => 'textarea', 'class' => 'form-control'));
                    echo $this->Form->button('POST', array('type' => 'submit','name' => 'submit', 'class' => 'btn btn-lg btn-success'));
                ?>
            </div>
            <div class="status">
                <div class="inner_status">
                    <?php //var_dump($all_info);
                            foreach($all_info as $a){
                                echo '<div class="post">';
                                    echo '<div class="post_bar">';
                                        echo '<small class="posted pull-left"><i><b>'.$a['User']['name'].'</b></i></small><br/>';
                                    echo '</div>';
                                    echo nl2br($a['Post']['post_data']).'<br/>';
                                    echo '<div class="post_bar">';
                                        //echo '<small class="posted pull-left"><i>Posted by: '.$a['User']['name'].'</i></small> |';
                                        echo '<small class="posted pull-left"><i> Posted on: '.$a['Post']['post_date'].'</i></small><br/>';
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

