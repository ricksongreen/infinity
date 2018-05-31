<?php
/**
 * Created by PhpStorm.
 * User: T08_Infinity
 * Date: 17/05/2018
 * Time: 11:57
 */
require_once APP_PATH . '/Model/admin.php';
?>


<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>



</head>
<body>
<form method="post" action="index.php?controller=admin&action=addLesson">
    <div class="container">
        <h1>Les Aanmaken</h1>
            <b>Naam</b> <input type="text" name="name" required placeholder="Naam invoeren"><br>
            <b>Datum</b> <input id="datepicker" type="date" name="date" required placeholder="Datum invoeren"><br>
            <b>Starttijd</b> <input type="time" name="startTime" required placeholder="Starttijd"><br>
            <b>Eindtijd</b> <input type="time" name="endTime" required placeholder="Eindtijd"><br>
            <select name="class" size="1">
                <?php
                /** creates dropdown menu of classes */
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
                /** creates a dropdown menu of teachers */
                $teachers = getAllTeachers();
                foreach($teachers as $teacher){
                    $ID = $teacher['ID'];
                    $number = $teacher['nummer'];
                    echo "<option value=$ID>$number</option>";
                }
                ?>
            </select><br><br>
        <b>Locatie</b><br><br>  <select name="location">
            <option selected="selected">ÀL.54</option>
            <?php
            // A sample location array
            $Location = array("AL.40", "AL4.44", "AL5.42", "AL8.39a" , "Al9.42", "Alnovum");

            // Iterating through the location array
            foreach($Location as $Locatie){
                ?>
                <option value="<?php echo strtolower($Locatie); ?>"><?php echo $Locatie; ?></option>
                <?php
            }
            ?>
        </select><br><br>
            <input type="submit" value="Verstuur" class="registerbtn">
    </div>
</form>
<script>
    //makes it easier to select date
    $(document).ready(function() {
        $("#datepicker").datepicker();
    });
</script>
</body>
</html>