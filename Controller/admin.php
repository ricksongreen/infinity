<?php
/**
 * User: T08_Infinity
 * Date: 8-5-2018
 * Time: 08:18
 */
require_once APP_PATH . '/Model/admin.php';

function addForm() {
    require_once APP_PATH . '/Views/admin/registration.php';
}

/** uses the information given at the registration form to create a user and set him in the database */
function add() {
    $user = $_POST;

    $user['wachtwoord'] = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

    addUser($user);

    header('Location:index.php?controller=admin&action=showUsers');
}

/** retrieves the users from the database and displays them */
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

/** deletes the user from the userlist and redirects to the same page to refresh */
function delete() {
    deleteUser($_GET['id']);
    header('Location:index.php?controller=admin&action=showUsers');
}

/** redirects to the form which lets the admins create a class */
function addClassForm() {
    require_once APP_PATH . '/Views/admin/newClass.php';
}

/** failsave to check if the Class name has indeed been entered and uses the given information to create a class in the database */
function addClass(){
    if(empty($_POST['klasnaam'])){
        header('Location: index.php?controller=admin&action=addClassForm');
    }
    makeClass($_POST);
}


/** makes a lesson with the information given in the form */
function addLesson(){
    makeLesson($_POST);
}

/** displays the form needed to create a lesson */
function addLessonForm(){
    require_once APP_PATH . '/Views/admin/newLesson.php';
}

/** shows the classlist */
function showClassAD(){
    require_once APP_PATH . '/Views/teacher/students.php';
}