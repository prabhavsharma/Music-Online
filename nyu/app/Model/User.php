<?php
class User extends AppModel{
    var $name = 'User';
    public $useTable = 'users';


    public $validate = array(


        'pwd' => array(
            'length' => array(
                'rule' => array('minLength', 6),
                'message' => 'Minimum 6 character long.'
            ),
            'Match passsword' => array(
                'rule' => 'matchPasswords',
                'message' => 'Your passwords donot match.'
            )
        ),


        'email' => array(
            'email' => array('rule' => 'email',
                'message' => 'Enter valid email id.'),

            'unique' => array('rule' => 'isUnique',
                'on' => 'create',
                'message' => 'This email-id already registered.'
            ),
            'empty' => array('rule' => 'notEmpty',
                'message' => 'Cannot left blank'
            )

        )


    );


    public function matchPasswords($data){
        if($data['password'] == $this->data['User']['Re-type Password']){
            return true;
        }
        $this->invalidate('Re-type Password', 'Your password donot match');
        return false;
    }

    public function beforeSave($options = array()) {
        /* password hashing */
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
    }

}

?>