<?php
class BandsController extends AppController{
    public function create(){
        $this->loadModel('Taste');
        $load_taste = $this->Taste->find('all');
        $this->set(compact('load_taste', 'load_taste'));

        //var_dump($this->request->data);

        $this->loadModel('Band');
        if(!empty($this->data)){
            $this->Band->create();
            //$this->request->data['User']['ip'] = $this->request->clientIp();
            $this->request->data['Band']['band_taste'] = $this->request->data['Bands']['band_taste']+1;
            $this->request->data['Band']['band_name'] = $this->request->data['Bands']['band_name'];
            //$this->request->data['login_attempt']['login_times'] = 1;
            $this->request->data['Band']['register_date'] = DboSource::expression('NOW()');
            if($this->Band->save($this->request->data)){

                //echo "<div id='footer_a_link'>";
                $this->Session->setFlash('Band has been registered successfully.');


                $this->redirect(array('action' => 'index', 'controller' => 'Bands'));
            }
            else{
                $this->Session->setFlash('Not Registered');
            }
        }
    }

    public function index(){

    }

    public function create_concert(){
        $this->loadModel('Taste');
        $load_taste = $this->Taste->find('all');
        $this->set(compact('load_taste', 'load_taste'));

        //var_dump($this->request->data);
        $this->loadModel('Band');
        $load_band = $this->Band->find('all');
        $this->set(compact('load_band', 'load_band'));


        $this->loadModel('Concert');
        //var_dump($this->request->data);
        if(!empty($this->data)){
            $this->Concert->create();
            //$this->request->data['User']['ip'] = $this->request->clientIp();
            $this->request->data['Concert']['concert_name'] = $this->request->data['Concerts']['concert_name'];
            $this->request->data['Concert']['concert_place'] = $this->request->data['Concerts']['concert_place'];
            $this->request->data['Concert']['concert_time'] = $this->request->data['Concerts']['concert_time'];
            $this->request->data['Concert']['concert_ticket_price'] = $this->request->data['Concerts']['concert_ticket_price'];
            $this->request->data['Concert']['concert_band'] = $this->request->data['concert_band']+1;
            $this->request->data['Concert']['concert_taste'] = $this->request->data['concert_taste']+1;
            //$this->request->data['Concert']['band_name'] = $this->request->data['Bands']['band_name'];
            //$this->request->data['login_attempt']['login_times'] = 1;
            $this->request->data['Concert']['concert_creation_date'] = DboSource::expression('NOW()');
            if($this->Concert->save($this->request->data)){

                //echo "<div id='footer_a_link'>";
                $this->Session->setFlash('Concert has been registered successfully.');


                //$this->redirect(array('action' => 'index', 'controller' => 'Bands'));
            }
            else{
                $this->Session->setFlash('Not Registered');
            }
        }
    }
}
?>