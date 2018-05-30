<?php
/**
 * User: T08_Infinity
 * Date: 03/05/2018
 * Time: 12:01
 */
include_once(APP_PATH. '/Model/Classes/User.php');
include_once(APP_PATH. '/Model/teacher.php');
include_once(APP_PATH. '/Model/student.php');

/** shows the login page */
function loginform() {
    require_once APP_PATH . '/Views/login.php';
}

/** uses the information on the login page and creates a user with that information */
function loginhandler() {
    $_SESSION['user'] = serialize(new User($_POST['username'], $_POST['password']));
}

/** Logs the user out and redirects to the homepage */
function logout() {
    session_destroy();
    echo "je bent uitgelogd";
    header('Location: index.php');
}

/** shows when the routes.php can not comply with the given controller and or action */
function error(){
    echo "er is iets misgegaan";
}

/** redirects to the homepage */
function homepage(){
    require_once APP_PATH . '/Views/homepage.php';
}