<?php
/**
 * User: T08_Infinity
 * Date: 25/04/2018
 * Time: 10:39
 */
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css"
</head>

<form method="post" action="index.php?controller=admin&action=add">
    <div class="container">
        <h1>Infinity Registratie</h1>
            <b>Voornaam</b> <input type="text" name="voornaam" placeholder="Voornaam" required><br>
            <b>Tussenvoegsel</b> <input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel"><br>
            <b>Achternaam</b> <input type="text" name="achternaam" placeholder="Achternaam" required><br>
            <b>Email</b> <input type="email" name="email" placeholder="Email" required><br>
            <b>Gebruikernaam</b> <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" required><br>
            <b>Wachtwoord</b> <input type="password" name="wachtwoord" placeholder="Wachtwoord"required><br>
            <b>Student-/Werknemersnummer</b> <input type="text" name="nummer" placeholder="Studentnummer"><br>
            <b>Opleiding Student</b> <input type="text" name="opleiding" placeholder="Opleiding"><br>
            <input type="checkbox" id="student" name="student"><label for="student"> Student</label><br>
            <input type="checkbox" id="docent" name="docent"><label for="docent"> Docent</label><br>
            <input type="checkbox" id="SLB" name="SLB"><label for ="SLB"> Studieloopbaan begeleider</label><br>
            <input type="checkbox" id="admin" name="admin"><label for="admin"> Admin</label><br>
            <input type="submit" value="Verstuur" class="registerbtn">
    </div>
</form>