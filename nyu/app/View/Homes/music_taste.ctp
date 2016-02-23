<div class="col-md-12">

    <div class="col-md-8 pull-left">
        <div class="col-md-12 upper_calling ">
            <h3>CHOOSE YOUR MUSIC GENRE</h3>


        </div>
        <div class="border">
            <?php
            echo '<h4>GENRE</h4>';
            $arr = array();
            foreach($genre as $r){
                $col = $r['Taste']['type']."(".$r['Taste']['category'].")";
                $arr[] = $r['Taste']['type'];
            }

            echo $this->Form->create('Taste', array('class' => 'form'));
            echo '<div class="checkbox">';
            echo $this->Form->input('Taste.type', array(
                'type' => 'select',
                'label' => false,
                'selected' => '',
                'class' => 'form-control',
                'multiple' => 'checkbox',
                'options' => $arr
            ));
            echo '</div>';
            ///////////////////////////////////////////////////////////////////////////////////////////////////////
            /*    echo '<h4>ROCK</h4>';

                $rock_arr = array();
                 foreach($rock as $r){
                     $rock_arr[] = $r['Taste']['type'];
                 }

                echo $this->Form->create('Taste', array('class' => 'form'));
                echo '<div class="checkbox">';
                    echo $this->Form->input('Taste.type', array(
                        'type' => 'select',
                        'label' => false,
                        'selected' => '',
                        'class' => 'form-control',
                        'multiple' => 'checkbox',
                        'options' => $rock_arr
                    ));
                echo '</div>';

            //////////////////////////////////////////////////////////////////////////////////////////////////////
                echo '<h4>COUNTRY</h4>';

            $country_arr = array();
            foreach($country as $r){
                $country_arr[] = $r['Taste']['type'];
            }


            echo '<div class="checkbox">';
            echo $this->Form->input('type', array(
                'type' => 'select',
                'label' => false,
                'selected' => '',
                'class' => 'form-control',
                'multiple' => 'checkbox',
                'options' => $country_arr
            ));
            echo '</div>';
            //////////////////////////////////////////////////////////////////////////////////////////////////////
            echo '<h4>POP</h4>';

            $pop_arr = array();
            foreach($pop as $r){
                $pop_arr[] = $r['Taste']['type'];
            }


            echo '<div class="checkbox">';
            echo $this->Form->input('type', array(
                'type' => 'select',
                'label' => false,
                'selected' => '',
                'class' => 'form-control',
                'multiple' => 'checkbox',
                'options' => $pop_arr
            ));
            echo '</div>';
            //////////////////////////////////////////////////////////////////////////////////////////////////////
            echo '<h4>CLASSICAL</h4>';

            $classical_arr = array();
            foreach($classical as $r){
                $classical_arr[] = $r['Taste']['type'];
            }


            echo '<div class="checkbox">';
            echo $this->Form->input('type', array(
                'type' => 'select',
                'label' => false,
                'selected' => '',
                'class' => 'form-control',
                'multiple' => 'checkbox',
                'options' => $classical_arr
            ));
            echo '</div>';
            //////////////////////////////////////////////////////////////////////////////////////////////////////
            echo '<h4>PUNK</h4>';

            $punk_arr = array();
            foreach($punk as $r){
                $punk_arr[] = $r['Taste']['type'];
            }


            echo '<div class="checkbox">';
            echo $this->Form->input('type', array(
                'type' => 'select',
                'label' => false,
                'selected' => '',
                'class' => 'form-control',
                'multiple' => 'checkbox',
                'options' => $punk_arr
            ));
            echo '</div>';
            //////////////////////////////////////////////////////////////////////////////////////////////////////
            echo '<h4>JAZZ</h4>';

            $jazz_arr = array();
            foreach($jazz as $r){
                $jazz_arr[] = $r['Taste']['type'];
            }


            echo '<div class="checkbox">';
            echo $this->Form->input('type', array(
                //'type' => 'select',
                'label' => false,

                'class' => 'form-control',
                'multiple' => 'checkbox',
                'options' => $jazz_arr
            ));
            echo '</div>';
            //////////////////////////////////////////////////////////////////////////////////////////////////////
            echo '<h4>METAL</h4>';

            $metal_arr = array();
            foreach($metal as $r){
                $metal_arr[] = $r['Taste']['type'];
            }


            echo '<div class="checkbox">';
            echo $this->Form->input('type', array(
                'type' => 'select',
                'label' => false,
                'class' => 'form-control',
                'multiple' => 'checkbox',
                'options' => $metal_arr
            ));
            echo '</div>';*/
            //////////////////////////////////////////////////////////////////////////////////////////////////////
                echo '</br>';
                echo $this->Form->button('UPDATE INFO', array('type' => 'submit', 'class' => 'btn btn-lg btn-success'));
                echo $this->Form->end();
            ?>
        </div>
    </div>
    <?php echo $this->element('right'); ?>
</div>