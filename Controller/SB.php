<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 30/05/2018
 * Time: 14:02
 */

/** shows the list of students with presence percentage */
function percentageStudents(){
    require_once APP_PATH . '/Views/SB/main.php';
}

/** shows the classlist */
function showClassSB(){
    require_once APP_PATH . '/Views/teacher/students.php';
}