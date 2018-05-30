<?php
/**
 * Created by PhpStorm.
 * User: ricks
 * Date: 30/05/2018
 * Time: 20:45
 */

include_once APP_PATH . '/Model/admin.php';

?>
<html>
<head>

</head>
<body>

<table class="customers">
    <tr>
        <th>
            Lesnaam
        </th>
        <th>
            Locatie
        </th>
        <th>
            Datum
        </th>
        <th>
            Tijd
        </th>
        <th>
            Klas
        </th>
        <th>
            Docent
        </th>
    </tr>

    <?php
    /** creates a table bases on the students of the class */
    $lessons = getAllLessons();
    foreach($lessons as $lesson){
        echo "<tr><td>" . $lesson['naam'] . "</td><td>" . $lesson['locatie'] . "</td><td>" . $lesson['datum'] . "</td><td>" . $lesson['begintijd'] . "-" . $lesson['eindtijd'] . "</td><td>" . $lesson['klasnaam'] . "</td><td>" . $lesson['nummer'] . "</td></tr>";
    }
    ?>
</table>
</body>
</html>