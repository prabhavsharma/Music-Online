<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">NYU</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li><?php echo $this->Html->link('Sign up', array('controller' => 'users', 'action' => 'add')
                                  ); ?></li>
                            <li class="active"><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')
                                                                        ); ?></li>

                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                <h1 class="cover-heading">Login</h1>
                <p class="lead">
                   <?php echo $this->Form->create();
                    echo $this->Form->input('email', array('label' => 'Email', 'class'=>"form-control", 'placeholder'=>"Enter email address", 'type' => 'email'));
                    echo $this->Form->input('password', array('class'=>"form-control", 'placeholder'=>"Enter password"));
                    ?>
                </p>
                <p class="lead">
                    <?php
                    echo $this->Form->button('Login', array('type' => 'submit', 'class' => 'btn btn-lg btn-success'));
                    echo $this->Form->end();
                    //echo $this->Form->button('REGISTER', array('type' => 'submit', 'class' => 'btn btn-lg btn-success'));
                    //echo $this->Form->end();
                    ?>

                </p>
            </div>



        </div>

    </div>

</div>












