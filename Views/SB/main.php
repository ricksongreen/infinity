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
<table id='customers' class="customers">
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
            $percentage = round(($student['total'] / $student['lessons']) * 100) . "% van " . $student['lessons'] . " lessen";
        }else{
            $percentage = "-";
        }
        if($percentage < 60){
            $text = "<td class=red>";
        }else{
            $text = "<td>";
        }
        $tussenvoegsel = "";
        if(!empty($student['tussenvoegsel'])) {
            $tussenvoegsel = $student['tussenvoegsel'] . " ";
            }
        echo "<tr><td>" . $student['nummer'] . "</td><td>" . $student['voornaam'] . " " . $tussenvoegsel . $student['achternaam'] . "</td>" . $text . $percentage . "</td></tr>";
    }
    ?>
</table>
</body>
</html>