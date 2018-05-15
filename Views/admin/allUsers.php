<?php
/**
 * Created by PhpStorm.
 * User: derpsider
 * Date: 25/04/2018
 * Time: 10:39
 */
?>

<html>
<head>
    <title>Infinity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>


    <h1>Gebruikers</h1>

    <table id="customers">
        <thead>
        <tr>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
        </tr>
        </thead>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $user['voornaam'] ?></td>
                <td><?php echo $user['tussenvoegsel'] ?></td>
                <td><?php echo $user['achternaam'] ?></td>
            </tr>
        <?php } ?>
    </table>


</div>
</html>
