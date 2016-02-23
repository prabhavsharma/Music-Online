<?php
class Post extends AppModel{
    var $name = 'Post';
    public $useTable = 'posts';

    var $belongsTo = array(
        'User' => array(
            'className'     => 'User',
            'foreignKey'    => 'login_id'
        )
    );
}