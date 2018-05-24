<?php
/**
 * User: T08_Infinity
 * Date: 03/05/2018
 * Time: 12:01
 */
include_once(APP_PATH. '/Model/Classes/User.php');
include_once(APP_PATH. '/Model/teacher.php');
//login page
function loginform() {
    require_once APP_PATH . '/Views/login.php';
}

function loginhandler() {
        $_SESSION['user'] = serialize(new User($_POST['username'], $_POST['password']));
    }

function logout() {
    session_destroy();
    echo "je bent uitgelogd";
    header('Location: index.php');
}

function error(){
    echo "er is iets misgegaan";
}

function homepage(){
    require_once APP_PATH . '/Views/homepage.php';
}