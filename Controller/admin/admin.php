<?php
/**
 * Created by PhpStorm.
 * User: stene
 * Date: 8-5-2018
 * Time: 08:18
 */
require_once APP_PATH . '/Model/admin.php';
function addForm() {

    require_once APP_PATH . '/Views/admin/registration.php';
}

function add() {
    $user = $_POST;

    $user['wachtwoord'] = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

    addUser($user);

    echo "<p>user aangemaakt</p>";
    showall();
}
