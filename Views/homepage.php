<?php
/**
 * User: T08_Infinity
 * Date: 26/04/2018
 * Time: 11:28
 */
require_once APP_PATH . '/Model/teacher.php';
require_once APP_PATH . '/Model/student.php';

if($_SESSION['rechten'] == 'docent' or $_SESSION['rechten'] == 'slb' or $_SESSION['rechten'] == 'slbadmin' or $_SESSION['rechten'] == 'admin') {
    $lessen = getScheduleTea();
}elseif($_SESSION['rechten'] == 'student'){
    $lessen = getScheduleStu();
}
?>

<div class="container">
    <div class="day-column">
        <div class="day-header">Vandaag</div>
            <div class="day-content">
                <?php
                $i = 0;
                if(!empty($lessen)){
                foreach($lessen as $les){
                    if($i == 0) {
                        echo "<div class='event gray'>";
                        $i = 1;
                    }else{
                        echo "<div class='event grey'>";
                        $i = 0;
                    }
                    if($_SESSION['rechten'] == 'student'){
                        echo "<span class='title'>" . $les['naam'] . " - " . $les['nummer'] . "</span>";

                    }else {
                        echo "<span class='title'>" . $les['naam'] . " - " . $les['klas'] . "</span>";
                    }
                    echo  "<footer>";
                    echo "<span><br>" . $les['begintijd'] . "-" . $les['eindtijd'] . "</span>";
                    echo "<span>" . $les['locatie'] . "</span>";
                    echo "</footer>";
                    echo "</div>";
                }}else{
                    echo "<div class='event red'><span>Er zijn voor vandaag geen lessen voor u gepland</span></div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

