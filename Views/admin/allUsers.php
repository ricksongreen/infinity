<?php
/**
 * User: T08_Infinity
 * Date: 25/04/2018
 * Time: 10:39
 */
?>

<html>
<head>
    <title>Infinity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style href="style.css" type="text/css" rel="stylesheet"></style>
</head>


    <h1>Gebruikers</h1>

    <table id="customers" class="customers">
        <thead>
        <tr>
            <th>Gebruikernaam</th>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
        </tr>
        </thead>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $user['gebruikersnaam']?></td>
                <td><?php echo $user['voornaam'] ?></td>
                <td><?php echo $user['tussenvoegsel'] ?></td>
                <td><?php echo $user['achternaam'] ?></td>
            </tr>
        <?php } ?>
    </table>


</div>
</html>
