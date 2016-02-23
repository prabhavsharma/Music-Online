<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">NYU</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li></li>
                            <li class="active"></li>

                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                <h1 class="cover-heading">Music Taste</h1>
                <div class="lead mid">
                    <?php
                        $options = array();
                        foreach($load_taste as $lt){
                            $options = $lt['Taste']['type'];
                        }
                        echo $this->Form->create('Taste', array('class' => 'form'));
                        echo $this->Form->input('type', array(
                            'type' => 'select',
                            'class' => 'form-control',
                            'multiple' => 'checkbox',
                            'options' => $options

                        ));

                    ?>
                </div>
                <p class="lead">
                    <?php
                        echo $this->Form->button('Save', array('class'=>"btn btn-success", 'type' => 'submit'));
                        //echo $this->Form->button('REGISTER', array('type' => 'submit', 'class' => 'btn btn-lg btn-success'));
                        echo $this->Form->end();
                    ?>

                </p>
            </div>
        </div>

    </div>

</div>










