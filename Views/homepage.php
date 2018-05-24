<?php
/**
 * User: T08_Infinity
 * Date: 26/04/2018
 * Time: 11:28
 */
require_once APP_PATH . '/Model/teacher.php';
require_once APP_PATH . '/Model/student.php';

if($_SESSION['rechten'] == 'docent' or $_SESSION['rechten'] == 'slb' or $_SESSION['rechten'] == 'slbadmin' or $_SESSION['rechten'] == 'admin') {
    print_r(getScheduleTea());
}elseif($_SESSION['rechten'] == 'student'){
    print_r(getScheduleStu());
}
?>

