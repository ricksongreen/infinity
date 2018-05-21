<?php
/**
 * User: T08_Infinity
 * Date: 8-5-2018
 * Time: 08:18
 */
require_once APP_PATH .'/Model/admin.php';

function addForm() {
    require_once APP_PATH .'/Views/admin/registration.php';
}

function add() {
    $user = $_POST;

    $user['wachtwoord'] = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

    addUser($user);

    echo "<p>user aangemaakt</p>";
}

function showUsers() {
    $users = getAllUsers();

    require_once APP_PATH . '/Views/admin/allUsers.php';
}

/** directing the certain files needed for a searchbar to work */
function search() {
    require_once APP_PATH . '/Model/admin.php';

    $query = $_POST['query'];
    $users = searchUsers($query);

    require_once APP_PATH . '/Views/admin/allUsers.php';
}

function delete() {
    deleteUser($_GET['id']);

    echo "<p>Gebruiker verwijderd</p>";
    showall();
}

/** redirects to the form which lets the admins create a class */
function addClassForm() {
    require_once APP_PATH . '/Views/admin/newClass.php';
}

/** failsave to check if the Class name has indeed been entered and uses the given information to create a class in the database */
function addClass(){
    if(empty($_POST['klasnaam'])){
        header('Location: index.php?controller=admin/admin&action=addClassForm');
    }
    makeClass($_POST);
}

function addLesson(){
    makeLesson($_POST);
}

function addLessonForm(){
    require_once APP_PATH . '/Views/admin/newLesson.php';
}