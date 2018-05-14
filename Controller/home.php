<?php
/**
 * Created by PhpStorm.
 * User: Mischa-PC
 * Date: 03/05/2018
 * Time: 12:01
 */
include_once(APP_PATH. '/Model/Classes/User.php');
//login page
function loginform() {
    require_once APP_PATH . '/Views/login.php';
}

function loginhandler() {
        $person = new User($_POST['username'], $_POST['password']);


        echo "Welkom $person->username";
        //header("Location: /infinity/index.php?controller=rooster&action=showall");
        //exit;
    }

function error(){
    echo "er is iets misgegaan";
}
