<?php

class LoginController {

    public static function login(){
        App::auth()->doLogin();
    }

    public static function logout() {
        App::auth()->doLogout();
    }

    public static function signup() {
        App::auth()->doSignUp();
    }
}