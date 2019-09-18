<?php
include 'App/Controller/Auth.php';

$auth = new Auth();

if (isset($_POST['login'])) {
    $auth->doLogin();
}

if (isset($_POST['signup'])) {
    $auth->doSignUp();
}

    //Remember me  

    if(isset($_POST['email']) && isset($_POST["password"]))
    {
        if(!empty($_POST["remember"]))
        {
            setcookie("email", $_POST["email"], time() + (30 * 24 * 60 * 60));
            setcookie("password", $_POST["password"], time() + (30 * 24 * 60 * 60));
        }
        else
        {
            if(isset($_COOKIE["email"]))
            {
                setcookie("email", "");
            }
            if(isset($_COOKIE["password"]))
            {
                setcookie("password", "");
            }
        }
        header("location:index.php");
    }