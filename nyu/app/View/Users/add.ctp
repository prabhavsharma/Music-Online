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
                            <li><?php echo $this->Html->link('Create Concert', array('controller' => 'bands', 'action' => 'create_concert')); ?></li>

                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                <h1 class="cover-heading">Signup</h1>
                <p class="lead">
                    <?php
                        $options = array('User' => 'User', 'Artist' => 'Artist');

                    echo $this->Form->create('User', array('class' => 'form form-group'));

                    echo $this->Form->input('name', array('type' => 'text', 'class' => 'dob form form-control'));
                    echo $this->Form->input('email', array('type' => 'text', 'class' => 'dob form form-control'));
                    echo $this->Form->input('password', array('type' => 'password', 'class' => 'dob form form-control'));
                    echo $this->Form->input('Re-type password', array('type' => 'password', 'class' => 'dob form form-control'));
                    echo $this->Form->input('mem', array('type' => 'select', 'class' => 'dob form form-control', 'options' => $options));
                    echo '</br>';
                    echo $this->Form->input('dob', array('type' => 'date', 'class' => 'dob', 'max'=>"1979-12-31"));



                    ?>
                </p>
                <p class="lead">
                    <?php
                    echo $this->Form->button('REGISTER', array('type' => 'submit', 'class' => 'btn btn-lg btn-success'));
                    echo $this->Form->end();
                    ?>

                </p>
            </div>



        </div>

    </div>

</div>