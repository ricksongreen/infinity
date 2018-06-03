<?php
/**
 * Created by PhpStorm.
 * User: ricks
 * Date: 30/05/2018
 * Time: 22:29
 */

include_once APP_PATH . '/Model/student.php';

/** registers the user and refreshes the page */
function register(){
    registerStudent();
    header('Location: index.php');
}

/** shows the stats of the student */
function showStats(){
    require_once APP_PATH . '/Views/student/stats.php';
}