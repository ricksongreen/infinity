<?php
/**
 * Created by PhpStorm.
 * User: Mischa-PC
 * Date: 03/05/2018
 * Time: 12:01
 */
include (APP_PATH. '/Model/Classes/User.php');
//login page
function loginform() {
    require_once APP_PATH . '/Views/login.php';
}

function loginhandler() {
    $hash = getPasswordHash($_POST['email']);

    if (password_verify($_POST['password'], $hash)) {
        $_SESSION['admin'] = true;
        header("Location: /infinity/index.php?controller=rooster&action=showall");
        exit;
    }
}