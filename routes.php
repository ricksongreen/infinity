<?php
/**
 * User: T08_Infinity
 * Date: 03/05/2018
 * Time: 11:14
 */
function call($controller, $action) {
    // require the file that matches the controller name
    $includeFile = sprintf('%s/Controller/%s.php', APP_PATH, $controller);
    require_once($includeFile);

    // call the function that matches the action name
    call_user_func($action);
}

// if the user logs in as a systemowner
function isAdmin() {
    if($_SESSION['rechten'] == 'admin' or $_SESSION['rechten'] == 'slbadmin'){
    return true;
    }
}

// check if the controller and action are set, otherwise fall back to default controller and action
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
}   else {
    $controller = 'home';
    $action = 'loginform';
}

// a list of the controllers we have and their actions we consider "allowed" values
$allowedControllers = array(
    'home' => array ('loginform', 'loginhandler', 'logout', 'homepage'),
    'admin' => array('addForm', 'add', 'showUsers', 'search', 'delete', 'addClass', 'addClassForm', 'addLesson', 'addLessonForm'),
    'teacher' => array('showClass')
);


// allow extra controller when user is logged in as admin(systemowner)
if (isAdmin()) {
    $allowedControllers['admin/rooster'] = array (
        'delete', 'add', 'change'
    );
}

// check that the requested controller and action are both allowed
// if someone tries to access something else (s)he will be redirected to the error action of the pages controller
if (!array_key_exists($controller, $allowedControllers)) {
    call('home', 'error');
} else if (!in_array($action, $allowedControllers[$controller])) {
    call('home', 'error');
} else if (in_array($action, $allowedControllers['admin']) and isAdmin() == false) {
    if($_SESSION['ingelogd'] == true){
        header('Location: index.php?controller=home&action=homepage');
    }else {
        header('/index.php?controller=home&action=loginform');
    }
} else {
    call($controller, $action);
}