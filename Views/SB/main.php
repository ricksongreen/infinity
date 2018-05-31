<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 30/05/2018
 * Time: 14:02
 */

require_once APP_PATH . '/Model/SB.php';

?>
<html>
<head>

</head>
<body>
<table class="customers">
    <tr>
        <th>
            Nummer
        </th>
        <th>
            Naam
        </th>
        <th>
            Aanwezigheid
        </th>
    </tr>

    <?php
    /** creates a table bases on the students of the class */
    $students = calculate();
    foreach($students as $student){
        if($student['lessons'] > 0) {
            $percentage = round(($student['total'] / $student['lessons']) * 100);
            $percentageText = $percentage . "% van " . $student['lessons'] . " lessen";
        }else{
            $percentageText = "-";
        }
        if($percentage < 40){
            $text = "<td class='redopaque'>";
        }elseif($percentage < 66){
            $text = "<td class='orangeopaque'>";
        }else{
            $text = "<td>";
        }
        $tussenvoegsel = "";
        if(!empty($student['tussenvoegsel'])) {
            $tussenvoegsel = $student['tussenvoegsel'] . " ";
            }
        echo "<tr id='" . $student['ID'] . "'>" . $text . $student['nummer'] . "</td>" . $text . $student['voornaam'] . " " . $tussenvoegsel . $student['achternaam'] . "</td>" . $text . $percentageText . "</td></tr>";
    }
    ?>
</table>
<script>
    <?php
    /** when a the SB clicks on a student, the registerbutton will be shown */
    foreach($students as $student){
        echo "document.getElementById(" . "'" . $student['ID'] . "'" . ").onclick = function() {
        location.href = 'index.php?controller=SB&action=showStatsSB&id=" . $student['ID'] . "';};";
    };
    ?>
</script>
</body>
</html>