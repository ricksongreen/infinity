<?php
/**
 * Created by PhpStorm.
 * User: stene
 * Date: 8-5-2018
 * Time: 08:18
 */
function addForm() {

    require_once APP_PATH . '/views/admin/registration.php';
}

function add() {
    $user = $_POST;

    $user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    addUser($user);

    echo "<p>user aangemaakt</p>";
    showall();
}
