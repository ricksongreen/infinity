<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 17/05/2018
 * Time: 11:57
 */
require_once APP_PATH . '/Model/admin.php';
?>


<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css"
</head>
<body>
<form method="post" action="index.php?controller=admin/admin&action=addLesson">
    <div class="container">
        <h1>Infinity Registratie</h1>
            <b>Naam</b> <input type="text" name="name" required><br>
            <b>Locatie</b> <input type="text" name="location" required><br>
            <b>Datum</b> <input type="date" name="date" required><br>
            <b>Starttijd</b> <input type="time" name="startTime" required><br>
            <b>Eindtijd</b> <input type="time" name="endTime" required><br>
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
            <select name="teacher" size="1">
                <?php
                $teachers = getAllTeachers();
                foreach($teachers as $teacher){
                    $ID = $teacher['ID'];
                    $number = $teacher['nummer'];
                    echo "<option value=$ID>$number</option>";
                }
                ?>
            </select>
            <input type="submit" value="Verstuur" class="registerbtn">
    </div>
</form>
</body>
</html>