<?php
include 'App/Controller/Auth.php';

$auth = new Auth();

if (isset($_POST['login'])) {
    $auth->doLogin();
}

if (isset($_POST['signup'])) {
    $auth->doSignUp();
}

    