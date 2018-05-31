<?php
/**
 * User: T08_Infinity
 * Date: 26/04/2018
 * Time: 11:28
 */
require_once APP_PATH . '/Model/teacher.php';
require_once APP_PATH . '/Model/student.php';

/** retrieves the schedule of the employee or student based on their rights */
if($_SESSION['rechten'] == 'docent' or $_SESSION['rechten'] == 'slb' or $_SESSION['rechten'] == 'slbadmin' or $_SESSION['rechten'] == 'admin') {
    $lessen = getScheduleTea();
}elseif($_SESSION['rechten'] == 'student'){
    $lessen = getScheduleStu();
}
/** $arrayLes will be used to work with the generated javascript */
$arrayLes = [];
?>
<html>
<header>

</header>
<body>
<!-- creates the option to register for the students which can be displayed with javascript -->
<div id="register" class="container" style="display:none">
    <h1>Aanmelden voor de les:</h1><br>
    <span id="lessonname"></span><br>
    <form method="post" action="index.php?controller=home&action=register">
        <span id="hidden"></span>
        <input type="submit" value="Meld je aan">
    </form>
</div>

<!-- Places the lessons into a container whith the name, teachernumber or classname, time and location -->
<div id="container" class="container">
    <div class="day-column">
        <div class="day-header">Vandaag</div>
        <div class="day-content">
            <?php
            $i = 0;
            if(!empty($lessen)){
                foreach($lessen as $les){
                    /** $there will store the retrieved information about wether the lesson has been registered for already
                     * If that is the case, the lessons will be marked red or green which corresponds with the given presence*/
                    $there = registered($les['ID']);
                    if($there['aanwezigheid'] === '1'){
                        echo "<div class='event green' id='$les[ID]'>";
                    }elseif($there['aanwezigheid'] === '0'){
                        echo "<div class='event red' id='$les[ID]'>";
                    }elseif($i == 0) {
                        echo "<div class='event gray' id='$les[ID]'>";
                        $i = 1;
                    }else{
                        echo "<div class='event grey' id='$les[ID]'>";
                        $i = 0;
                    }
                    if($_SESSION['rechten'] == 'student'){
                        echo "<span class='title'>" . $les['naam'] . "</span>";
                        echo "<span class='title span'>" . $les['nummer'] . "</span>";
                    }else {
                        echo "<span class='title'>" . $les['naam'] . "</span>";
                        echo "<span class='title span'>" . $les['klas'] . "</span>";
                    }
                    echo  "<footer>";
                    echo "<span>" . $les['begintijd'] . "-" . $les['eindtijd'] . "</span>";
                    echo "<span class='span'>" . $les['locatie'] . "</span>";
                    echo "</footer>";
                    echo "</div>";
                    /** stores the ID and lessonname and starttime in an array */
                    $smallerArray = array('ID' => $les['ID'], 'name' => $les['naam'], 'startTime' => $les['begintijd']);
                    $arrayLes[] = $smallerArray;
                }
            }else{
                /** this will be shown when there are no lessons for the day */
                echo "<div class='event red'><span>Er zijn voor vandaag geen lessen voor u gepland</span></div>";
            }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    <?php
            /** when a student clicks on a lesson, the registerbutton will be shown */
        if($_SESSION['rechten'] == 'student'){
            foreach($arrayLes as $array){
                $there = registered($array['ID']);
                if(!($there['aanwezigheid'] === '0' or $there['aanwezigheid'] === '1')){
                    echo "document.getElementById(" . "'" . $array['ID'] . "'" . ").onclick = function() {
                    document.getElementById('register').style.display = 'block';
                    document.getElementById('container').style.display = 'none';
                    document.getElementById('lessonname').innerHTML = " . "'" . $array['name'] . "'" . ";
                    document.getElementById('hidden').innerHTML = \"<input type='hidden' name='ID' value='" . $array['ID'] . "'><input type='hidden' name='startTime' value='" . $array['startTime'] . "'>\";
                    };";
                }
            }
        }
?>
</script>
</body>
</html>

