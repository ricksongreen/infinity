<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 25/04/2018
 * Time: 10:39
 */
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css"
</head>

<form method="post" action="index.php?controller=admin/admin&action=add">
    <div class="container">
        <h1>Infinity Registratie</h1>
        <label for="email"><b>Voornaam</b> <input type="text" name="voornaam" required><br>
            <b>Tussenvoegsel</b> <input type="text" name="tussenvoegsel"><br>
            <b>Achternaam</b> <input type="text" name="achternaam" required><br>
            <b>Email</b> <input type="email" name="email" required><br>
            <b>Gebruikernaam</b> <input type="text" name="gebruikersnaam" required><br>
            <b>Wachtwoord</b> <input type="password" name="wachtwoord" required><br>
            <b>Student-/Werknemersnummer</b> <input type="text" name="nummer" ><br>
            <b>Opleiding Student</b> <input type="text" name="opleiding"><br>
            <input type="checkbox" name="student"> Student<br>
            <input type="checkbox" name="docent"> Docent<br>
            <input type="checkbox" name="SLB"> Studieloopbaan begeleider<br>
            <input type="checkbox" name="admin"> Admin<br>
            <input type="submit" value="Verstuur" class="registerbtn">
    </div>
</form>