<?php
/**
 * Created by PhpStorm.
 * User: ricks
 * Date: 16/05/2018
 * Time: 18:35
 */
require_once APP_PATH . '/Model/admin.php';
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css"
    </head>
<body>
<form method="post" action="index.php?controller=admin/admin&action=addClass">
    <div class="container">
        <h1>Klassen aanmaken</h1>
            <b>Klasnaam</b> <input type="text" name="klasnaam" required><br>
            <select name="students[]" size="20" multiple>
                <?php
                $students = getAllClasslessStudents();
                foreach($students as $student){
                    $ID = $student['ID'];
                    $name = $student['voornaam'].' '.$student['tussenvoegsel'].' '.$student['achternaam'];
                    $number = $student['nummer'];
                    $education = $student['opleiding'];
                    echo "<option value=$ID>$name $number $education</option>";
                }
                ?>
            </select><br>
            <input type="submit" value="Verstuur" class="registerbtn">
    </div>
</form>
<script>
    //this script makes it possible to easily select multiple values
    window.onmousedown = function (e) {
        var el = e.target;
        if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
            e.preventDefault();

            // toggle selection
            if (el.hasAttribute('selected')) el.removeAttribute('selected');
            else el.setAttribute('selected', '');

            // hack to correct buggy behavior
            var select = el.parentNode.cloneNode(true);
            el.parentNode.parentNode.replaceChild(select, el.parentNode);
        }
    }
</script>
</body>
</html>