<?php
class HomesController extends AppController{

    public function beforeFilter(){
        $name = $this->Auth->user()['name'];
        $this->set(compact('name','name'));

        $id = $this->Auth->user()['id'];

        $this->loadModel('User');
        $music_taste = $this->User->find('all', array('conditions' => array('id' => $id)));
        //var_dump($music_taste);
        //$music_taste = explode(',', $music_taste);
        $mt = explode(',',$music_taste[0]['User']['music_taste']);

        $t = array();
        foreach($mt as $m){
            $m = $m+1;
           // echo $m;
            $this->loadModel('Taste');
            $m = $this->Taste->find('all', array('conditions' => array('id' => $m)));
            $t[] = $m[0]['Taste']['type'];
        }
        $trans_mus = $t;
        //var_dump($trans_mus);
        $this->set(compact('trans_mus','trans_mus'));
     ////////////////////////////CONCERT/////////////////////////////////////////////////////////////////
        $place = $this->Auth->user()['place'];
        //var_dump($this->Auth->user());
        $this->loadModel('Concert');
        $concert = $this->Concert->find('all', array('conditions' => array('concert_place' => $place)));
        $this->set(compact('concert', 'concert'));


     /////////////////////////////SEARCH/////////////////////////////////////////////////////////
        $this->loadModel('User');
        if(isset($this->request->data['search'])){
            $user = $this->request->data['search1'];
            $coll_user = $this->User->find('all', array('conditions' => array (
                "User.name LIKE" => "%".$user."%",
            )
            ));
            //var_dump($coll_user);
            $this->set(compact('coll_user', 'coll_user'));
            //$this->redirect(array('controller' => 'Homes', 'action'=>'search_term'));
        }
     ///////////////////////////////////////////////////////////////////////////////////////////

    }

    public function index(){
        //var_dump($this->Auth->user());
        $id = $this->Auth->user()['id'];
        $this->loadModel('Band');
        $ba = $this->Band->find('all', array('conditions' => array('login_id' => $id)));
        //var_dump($ba);
        //exit();
        $band_id = $ba['0']['Band']['band_id'];
        if($this->Auth->user()['mem'] == 'Artist' && $ba['0']['Band']['band_name'] == null){
            $this->redirect(array('controller' => 'Homes', 'action' => 'band', $id, $band_id));
            exit();
        }else{
            $this->redirect(array('controller' => 'Homes', 'action' => 'bandcpanel', $id, $band_id));
        }

        if ($this->Auth->user()){

             //$this->Session->setFlash("Welcome ".$name);
            if(isset($this->request->data['submit'])){
                //if(!empty($this->request->data['submit'])){
                    //var_dump($this->request->data['Post']['post_data']);
                    $login_id = $this->Auth->user()['id'];

                    $this->request->data['Post']['post_data'] = strip_tags(nl2br(h($this->request->data['Post']['post_data'])));
                    $this->request->data['Post']['post_date'] = DboSource::expression('NOW()');
                    $this->request->data['Post']['login_id'] = $login_id;
                    $this->loadModel('Post');
                    $this->Post->create();
                    if($this->Post->save($this->request->data)){
                        echo 'Your status successfully posted.';
                    }else{
                        echo 'Sorry!!! status not updated.';
                    }
               // }
        }
            //var_dump($this->request->data['search']);
            $this->loadModel('Post');
            $all_info = $this->Post->find('all');

            $this->set(compact('all_info', 'all_info'));



        }
    }

    public function taste(){
        $this->loadModel('Taste');
        $load_taste = $this->Taste->find('all');
        $this->set(compact('load_taste', 'load_taste'));

        foreach($this->request->data['Taste']['type'] as $t){
            echo $t;
        }

    }

    public function edit_profile(){

        $name = $this->Auth->user()['name'];
        $this->set(compact('name','name'));

        $id = $this->Auth->user()['id'];

        $this->loadModel('User');
        $info = $this->User->find('all', array('conditions' => array('id' => $id)));
        $place = $info[0]['User']['place'];
        $this->set(compact('place', 'place'));

        $country = $info[0]['User']['country'];
        $this->set(compact('country', 'country'));

        if($this->request->is('post')){
            $this->loadModel('User');
            //var_dump($this->request->data);

            $country = $this->request->data['User']['country'];
            $this->set(compact('country', 'country'));

            $place = $this->request->data['User']['place'];
            $this->set(compact('place', 'place'));

            $this->User->updateAll(array(
                    'place' => "'$place'",
                    'country' => "'$country'"),
                array('id' => $id)
            );

            $this->Session->setFlash('Your profile has been successfully updated.');

        }


    }

    public function music_taste(){
        $login_id = $this->Auth->user()['id'];
        $this->loadModel('Taste');
        $genre = $this->Taste->find('all');
        $this->set(compact('genre', 'genre'));

        /*$rock = $this->Taste->find('all', array('conditions' => array('category' => 'Rock')));
        $this->set(compact('rock', 'rock'));

        $country = $this->Taste->find('all', array('conditions' => array('category' => 'Country')));
        $this->set(compact('country', 'country'));

        $pop = $this->Taste->find('all', array('conditions' => array('category' => 'Pop')));
        $this->set(compact('pop', 'pop'));

        $classical = $this->Taste->find('all', array('conditions' => array('category' => 'Classical')));
        $this->set(compact('clasical', 'classical'));

        $punk = $this->Taste->find('all', array('conditions' => array('category' => 'Punk')));
        $this->set(compact('punk', 'punk'));

        $jazz = $this->Taste->find('all', array('conditions' => array('category' => 'Jazz')));
        $this->set(compact('jazz', 'jazz'));

        $metal = $this->Taste->find('all', array('conditions' => array('category' => 'Metal')));
        $this->set(compact('metal', 'metal'));*/

        if($this->request->is('post')){
            $options = array();
            $call = implode(',',$this->request->data['Taste']['type']);
            foreach($this->request->data['Taste']['type'] as $t){
                $options[] = implode(',',$t);
            }
            var_dump($call);
            $this->loadModel('User');
            $this->User->updateAll(array(
                    'music_taste' => "'$call'",
                   ),
                array('id' => $login_id)
            );
            $this->redirect(array('controller' => 'Homes', 'action' => 'index'));
            $this->Session->setFlash('Your Music Genre has been successfully updated.');
        }
    }

    public function search_term(){
    }

    public function view_profile($id,$name){
        $this->loadModel('User');
        //var_dump($name);
        $this->set(compact('name','name'));
        $music_taste = $this->User->find('all', array('conditions' => array('id' => $id)));
        //var_dump($music_taste);
        //$music_taste = explode(',', $music_taste);
        $mt = explode(',',$music_taste[0]['User']['music_taste']);

        $t = array();
        foreach($mt as $m){
            $m = $m+1;
            // echo $m;
            $this->loadModel('Taste');
            $m = $this->Taste->find('all', array('conditions' => array('id' => $m)));
            $t[] = $m[0]['Taste']['type'];
        }
        $trans_m = $t;
        //var_dump($trans_mus);
        $this->set(compact('trans_m','trans_m'));


        $this->loadModel('Post');
        $post = $this->Post->find('all', array('conditions' => array('login_id' => $id)));
        $this->set(compact('post','post'));

    }

    public function view_concert($id, $place){
        $this->loadModel('Concert');
        $con = $this->Concert->find('all', array('conditions' => array('concert_id' => $id)));
        $this->set(compact('con', 'con'));




        $login_id = $this->Auth->user()['id'];
        $this->loadModel('Follow');
        $check_follow = $this->Follow->find('all', array('conditions' => array('login_id' => $login_id,
                                                                'followed_to' => $id)));

        if($check_follow != null){
            $this->set(compact('check_follow', 'check_follow'));
            //var_dump($check_follow);
        }

    }

    public function follow_concert($get_val, $name){

        $this->loadModel('Follow');
        $login_id = $this->Auth->user()['id'];

        $this->Follow->create();
        $this->request->data['Follow']['login_id'] = $login_id;
        $this->request->data['Follow']['followed_to'] = $get_val;

        if($this->Follow->save($this->request->data)){

            //echo "<div id='footer_a_link'>";
            $this->Session->setFlash('You have started following <b>'.$name.'</b>');


            $this->redirect(array('action' => 'view_concert', 'controller' => 'Homes'));
        }
        else{
            $this->Session->setFlash('Not followed due to some errors');
        }
    }

    public function rsvp($id, $left){
        echo $id;
        echo $left;
        $left = $left-1;
        $this->loadModel('Concert');

        $this->Concert->updateAll(array(
                'left' => "'$left'"),
            array('concert_id' => $id)
        );

        $login_id = $this->Auth->user()['id'];
        $this->loadModel('Rsvp');
        $this->Rsvp->create();
        $this->request->data['Rsvp']['login_id'] = $login_id;
        $this->request->data['Rsvp']['rsvp_to'] = $id;
        if($this->Rsvp->save($this->request->data)){
            $this->Session->setFlash('You are successfully registered to concert. ENJOY!!!');
            $this->redirect(array('action' => 'view_concert', 'controller' => 'Homes'));
        }
        $check_rsvp = $this->Rsvp->find('all', array('conditions' => array('login_id' => $login_id)));
        if($check_rsvp != null){
            $this->set(compact('check_rsvp', 'check_rsvp'));
        }
        $test = $this->Concert->find('all');
        $this->set(compact('test', 'test'));


    }

    public function band($id){
        $this->loadModel('Taste');
        $load_taste = $this->Taste->find('all');
        $this->set(compact('load_taste', 'load_taste'));

        //var_dump($this->request->data);

        $this->loadModel('Band');
        if(!empty($this->data)){
            $this->Band->create();
            //$this->request->data['User']['ip'] = $this->request->clientIp();
            $this->request->data['Band']['login_id'] = $id;
            $this->request->data['Band']['band_taste'] = $this->request->data['Bands']['band_taste']+1;
            $this->request->data['Band']['band_name'] = $this->request->data['Bands']['band_name'];
            //$this->request->data['login_attempt']['login_times'] = 1;
            $this->request->data['Band']['register_date'] = DboSource::expression('NOW()');
            if($this->Band->save($this->request->data)){

                //echo "<div id='footer_a_link'>";
                $this->Session->setFlash('Band has been registered successfully.');


                $this->redirect(array('action' => 'bandcpanel', 'controller' => 'Homes'));
            }
            else{
                $this->Session->setFlash('Not Registered');
            }
        }
    }

    public function bandcpanel($id, $band_id){
        $login_id = $this->Auth->user()['id'];
        var_dump($this->request->data);
        $this->loadModel('Bandstatus');
        if($this->request->is('post')){
            $this->Bandstatus->create();
            $this->request->data['Bandstatus']['login_id'] = $login_id;
            $this->request->data['Bandstatus']['band_id'] = $band_id;
            $this->request->data['Bandstatus']['date'] = DboSource::expression('NOW()');
            if($this->Bandstatus->save($this->request->data)){
                $this->Session->setFlash('Status has been successfully posted.');
                $this->redirect(array('controller' => 'Homes', 'action' => 'bandcpanel'));
            }
        }

        $this->loadModel('Fan');
        $check_follow = $this->Fan->find('all', array('conditions' => array('login_id' => $login_id,
            'fan_of' => $band_id)));

        if($check_follow != null){
            $this->set(compact('check_follow', 'check_follow'));
            //var_dump($check_follow);
        }

        $this->loadModel('Band');
        $band = $this->Band->find('all', array('conditions' => array('login_id' => $login_id)));
        $this->set(compact('band', 'band'));

        $this->loadModel('BandStatus');
        $bandst = $this->BandStatus->find('all', array('conditions' => array('login_id' => $login_id)));
        $this->set(compact('bandst', 'bandst'));

    }

    public function fan($band_id){
        $this->loadModel('Fan');
        $login_id = $this->Auth->user()['id'];
        $this->Fan->create();
        $this->request->data['Fan']['login_id'] = $login_id;
        $this->request->data['Fan']['fan_of'] = $band_id;

        if($this->Fan->save($this->request->data)){

            //echo "<div id='footer_a_link'>";
            $this->Session->setFlash('You have become fan of this Band.');


            $this->redirect(array('action' => 'view_concert', 'controller' => 'Homes'));
        }
        else{
            $this->Session->setFlash('Not followed due to some errors');
        }
    }

    public function search_by_name(){
        $this->loadModel('Band');
        if(isset($this->request->data['search'])){
            $user = $this->request->data['search1'];
            $coll_user = $this->Band->find('all', array('conditions' => array (
                "band_name LIKE" => "%".$user."%",
            )
            ));
            //var_dump($coll_user);
            $this->set(compact('coll_user', 'coll_user'));
            //$this->redirect(array('controller' => 'Homes', 'action'=>'search_term'));
        }
    }

    public function view_band($id, $name){
            echo $id;
            $this->loadModel('Band');
            //var_dump($name);
            $this->set(compact('name','name'));
            $music_taste = $this->Band->find('all', array('conditions' => array('band_id' => $id)));
            //var_dump($music_taste);
            //$music_taste = explode(',', $music_taste);
            $mt = explode(',',$music_taste[0]['Band']['band_taste']);

            $t = array();
            foreach($mt as $m){
                $m = $m+1;
                // echo $m;
                $this->loadModel('Taste');
                $m = $this->Taste->find('all', array('conditions' => array('id' => $m)));
                $t[] = $m[0]['Taste']['type'];
            }
            $trans_m = $t;
            //var_dump($trans_mus);
            $this->set(compact('trans_m','trans_m'));


            $this->loadModel('Bandstatus');
            $post = $this->Bandstatus->find('all', array('conditions' => array('band_id' => $id)));
            $this->set(compact('post','post'));

        $this->loadModel('Band');
        $band = $this->Band->find('all', array('conditions' => array('login_id' => $id)));
        $this->set(compact('band', 'band'));


    }
}
?>