<?php
    class UsersController extends AppController{
        public function add(){
            //var_dump($this->request->data);
            $this->loadModel('User');
            $us = $this->User->find('all');
            //var_dump($us['0']);

            if(!empty($this->data)){
                $this->loadModel('User');
                $this->User->create();
                //$this->request->data['User']['ip'] = $this->request->clientIp();
                $m = $this->request->data['User']['dob']['month'];
                $d = $this->request->data['User']['dob']['day'];
                $y = $this->request->data['User']['dob']['year'];
                $dob = $m.'-'.$d.'-'.$y;

                //$mem = $this->request->data['User']['member'];
                //var_dump($mem);

                $this->request->data['User']['dob'] = $dob;
                //$this->request->data['User']['mem'] = 'User';
                //$this->request->data['login_attempt']['login_times'] = 1;
                $this->request->data['User']['register_date'] = DboSource::expression('NOW()');
                if($this->User->save($this->request->data)){

                    //echo "<div id='footer_a_link'>";
                    $this->Session->setFlash('You are registered successfully. Please log in.');


                   // $this->redirect(array('action' => 'login', 'controller' => 'Users'));
                }
                else{
                    $this->Session->setFlash('Not Registered');
                }
            }
    }

    public function login(){
        if($this->request->is('post')){

            if($this->Auth->login()){

                    //$this->Session->setFlash("Welcome");
                    $this->redirect(array('action' => 'index', 'controller' => 'Homes'));


            }else{
                $this->Session->setFlash("Username/Password donot match.");
            }
        }
    }


        public function logout(){
            //$this->Session->setFlash('Good-Bye');
            $this->Session->destroy();
            $this->Auth->logout();
            $this->redirect(array('controller' => 'home',
                'action' => 'index'));
        }


    }
?>