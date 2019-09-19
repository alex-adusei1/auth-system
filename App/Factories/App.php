<?php
include 'App/Models/Auth.php';
include 'App/Models/User.php';

class App
{
    public static function auth()
    {
        return Auth::getInstance();
    }

    public static function user()
    {
        return new User();
    }
}
