<?php
session_start();
if (!isset($_SESSION['auth_user'])) {
    header("Location:index.php");
}
