<?php
/**
 * Created by PhpStorm.
 * User: ricks
 * Date: 30/05/2018
 * Time: 22:30
 */
require_once APP_PATH . '/Model/Classes/User.php';
require_once APP_PATH . '/Model/student.php';

if($_SESSION['rechten'] == 'student'){
    $user = unserialize($_SESSION['user']);
    $ID = $user->ID;
}elseif($_SESSION['rechten'] == 'slb' or $_SESSION['rechten'] == 'slbadmin') {
    $ID = $_GET['id'];
}
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
            Docent
        </th>
        <th>
            Datum
        </th>
        <th>
            Aanwezig?
        </th>
    </tr>

    <?php
    /** creates a table bases on the students of the class */
    $lessons = presenceLesson($ID);
    foreach($lessons as $lesson){
        if($lesson['aanwezigheid'] === '1'){
            $text = 'Ja';
        }else{
            $text = 'Nee';
        }
        echo "<tr><td>" . $lesson['naam'] . "</td><td>" . $lesson['nummer'] . "</td><td>" . $lesson['datum'] . "</td><td>" . $text . "</td></tr>";
    }
    ?>
</table>
</body>
</html>