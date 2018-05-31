<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 31/05/2018
 * Time: 14:58
 */

include_once APP_PATH . '/Model/teacher.php';
include_once APP_PATH . '/Model/Classes/User.php';

?>

<html>
<head>

</head>
<body>
<table class="customers">
    <tr>
        <th>
            Naam
        </th>
        <th>
            Klas
        </th>
        <th>
            Datum
        </th>
        <th>
            Aanwezigheid Studenten
        </th>
    </tr>

    <?php
    /** creates a table bases on the students of the class */
    $lessons = getLessons();
    foreach($lessons as $lesson){
        echo "<tr><td>" . $lesson['naam'] . "</td><td>" . $lesson['klasnaam'] . "</td><td>" . $lesson['datum'] . "</td><td>" . getPresence($lesson['ID']) . "</td></tr>";
    }
    ?>
</table>
</body>
</html>