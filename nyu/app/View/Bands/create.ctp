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
                            <li><?php echo $this->Html->link('Band', array('controller' => 'bands', 'action' => 'create')); ?></li>

                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                <h1 class="cover-heading">Create Band</h1>
                <p class="lead">
                    <?php
                    $options = array();
                    foreach($load_taste as $lt){
                        $options[] = $lt['Taste']['type'];

                    }
                    echo $this->Form->create('Bands', array('class' => 'form form-group'));
                    echo $this->Form->input('band_name', array('label' => 'Band Name','type' => 'text', 'class' => 'dob form form-control'));
                    echo $this->Form->input('band_taste', array(
                        'type' => 'select',
                        'class' => 'form-control dob',
                        //'multiple' => 'checkbox',
                        'options' => $options
                    ));
                    echo '</br>';



                    ?>
                </p>
                <p class="lead">
                    <?php
                    echo $this->Form->button('REGISTER BAND', array('type' => 'submit', 'class' => 'btn btn-lg btn-success'));
                    echo $this->Form->end();
                    ?>

                </p>
            </div>



        </div>

    </div>

</div>