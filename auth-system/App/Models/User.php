<?php
include __DIR__.'/Model.php';

class User extends Model {

    protected $attributes = [
        'fullname' => '', 'email' => '', 'password' => ''
    ];

    function __construct()
    {
        parent::__construct('users');
    }

    function __get($key) {
        return $this->attributes[$key];
    }
}