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

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row day-columns">
                <div class="day-column">
                    <div class="day-header">Monday</div>
                    <div class="day-content">
                        <div class="event gray">
                            <span class="title">Event Name</span>
<footer>
                            <span>4 Assets</span><br>
                            <span>4 Assets</span>
                            <span>4 Assets</span>
                            <span>4 Assets</span>
                            <span>20:00</span>
</footer>
                        </div>
                        <div class="event orange">
                            <span class="title">Event Name</span>
                            <footer>
                                <span>3 Assets</span>
                                <span>21:30</span>
                            </footer>
                        </div>
                        <div class="event red">
                            <span class="title">Event Name</span>
                            <footer>
                                <span>Prop1</span>
                                <span>20:30</span>
                            </footer>
                        </div>
                        <div class="event blue">
                            <span class="title">Event Name</span>
                            <footer>
                                <span>Prop1</span>
                                <span>20:30</span>
                            </footer>
                        </div>
                    </div>
                    <div class="day-footer">4 tasks</div>
                </div>

        </div>
    </div>
</div>
</div>

