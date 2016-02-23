<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">NYU</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li class="active"><?php echo $this->Html->link('Sign up', array('controller' => 'users', 'action' => 'add')
                                ); ?></li>
                            <li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?></li>
                            <li><?php echo $this->Html->link('Band', array('controller' => 'band', 'action' => 'create')); ?></li>

                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                <h1 class="cover-heading">Create Concert</h1>
                <p class="lead">
                    <?php
                        $options = array();
                        foreach($load_taste as $lt){
                            $options[] = $lt['Taste']['type'];

                        }
                        $options_band = array();
                        foreach($load_band as $lt){
                            $options_band[] = $lt['Band']['band_name'];

                        }
                        echo $this->Form->create('Concerts', array('class' => 'form form-group'));
                        echo $this->Form->input('concert_name', array('type' => 'text', 'class' => 'dob form form-control'));
                        //echo $this->Form->input('concert_band', array('type' => 'text', 'class' => 'dob form form-control'));
                        echo $this->Form->input('Band.band_name', array(
                            'type' => 'select',
                            'name' => 'concert_band',
                            'class' => 'form-control',
                            //'multiple' => 'checkbox',
                            'options' => $options_band
                        ));
                        echo $this->Form->input('concert_place', array('type' => 'text', 'class' => 'dob form form-control'));
                        echo $this->Form->input('concert_time', array('type' => 'text', 'class' => 'dob form form-control'));
                        echo $this->Form->input('concert_ticket_price', array('type' => 'text', 'class' => 'dob form form-control'));
                        echo $this->Form->input('Taste.type', array(
                            'type' => 'select',
                            'class' => 'form-control',
                            'name' => 'concert_taste',
                            //'multiple' => 'checkbox',
                            'options' => $options
                        ));
                    ?>
                </p>
                <p class="lead">
                    <?php
                    echo $this->Form->button('REGISTER CONCERT', array('type' => 'submit', 'class' => 'btn btn-lg btn-success'));
                    echo $this->Form->end();
                    ?>

                </p>
            </div>



        </div>

    </div>

</div>