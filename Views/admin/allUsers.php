<?php
/**
 * Created by PhpStorm.
 * User: T08_Infinity
 * Date: 25/04/2018
 * Time: 10:39
 */
?>

<html>
<head>
    <title>Infinity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: transparent;
            background-image: url("/htdocs/resources/avatar1.jpg");
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;

        }



        input[type=text]:focus {
            width: 100%;
        }
    </style>
</head>

<body>
<h1>Gebruikers</h1>

<!--<form action="index.php?controller=admin/admin&action=search" method="POST">-->
<!--    <input type= "text" name="query">-->
<!--    <input type= "submit" value="Search">-->
<!--</form>-->

<form action="index.php?controller=admin/admin&action=search" method="POST">
    <input type="text" name="query" placeholder="Search..">
</form>

<table id="customers" class="customers">
    <thead>
    <tr>
        <th>Gebruikersnaam</th>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Verwijder</th>
    </tr>
    </thead>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user['gebruikersnaam'] ?></td>
            <td><?php echo $user['voornaam'] ?></td>
            <td><?php echo $user['tussenvoegsel'] ?></td>
            <td><?php echo $user['achternaam'] ?></td>
            <td> <a href="index.php?controller=admin/admin&action=delete&id=<?php echo $user['ID']; ?>"> delete </a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</div>
</html>
