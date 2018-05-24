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
<form method="post" >
    <select name="class" size="1">
        <?php
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

<table>
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
    $students = getStudentsFromClass($_POST['class']);
    foreach($students as $student){

    }
    ?>
</table>
</body>
</html>