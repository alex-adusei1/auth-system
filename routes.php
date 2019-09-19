<?php
include 'App/Factories/App.php';
include 'App/Controller/LoginController.php';

if (isset($_POST['login'])) {
    LoginController::login();
}

if (isset($_POST['signup'])) {
    LoginController::signup();
}
