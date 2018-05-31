<?php
/**
 * Created by PhpStorm.
 * User: ricks
 * Date: 23/05/2018
 * Time: 21:23
 */
require_once APP_PATH . '/Model/admin.php';
require_once APP_PATH . '/Model/teacher.php';

?>
<html>
<head>

</head>
<body>
<form method="post">
    <select name="class" size="1">
        <?php
        /** option list to get the classes */
        $classes = getAllClasses();
        foreach($classes as $class){
            $ID = $class['ID'];
            $name = $class['naam'];
            echo "<option value=$ID>$name</option>";
        }
        ?>
    </select>
    <input type="submit" value="Zoeken">
</form>

<table class="customers">
    <tr>
        <th>

        </th>
        <th>
            Nummer
        </th>
        <th>
            Naam
        </th>
    </tr>

    <?php
    /** creates a table bases on the students of the class */
    if(!empty($_POST['class'])) {
        $students = getStudentsFromClass($_POST['class']);
    }else{
        $students = getStudentsFromClass(1);
    }
    foreach($students as $student){
        $tussenvoegsel = "";
        if(!empty($student['tussenvoegsel'])) {
            $tussenvoegsel = $student['tussenvoegsel'] . " ";
            }
        echo "<tr><td></td><td>" . $student['nummer'] . "</td><td>" . $student['voornaam'] . " " . $tussenvoegsel . $student['achternaam'] . "</td></tr>";
    }
    ?>
</table>
</body>
</html>