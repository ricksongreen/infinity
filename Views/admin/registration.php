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
    <title>Infinity</title>
</head>
<body>
<h1>Infinity Registratie</h1>
<form method="post" action="index.php?controller=admin/admin&action=add">
    Voornaam: <input type="text" name="voornaam" required><br>
    Tussenvoegsel: <input type="text" name="tussenvoegsel"><br>
    Achternaam: <input type="text" name="achternaam" required><br>
    Email: <input type="email" name="email" required><br>
    Gebruikernaam: <input type="text" name="gebruikersnaam" required><br>
    Wachtwoord: <input type="password" name="wachtwoord" required><br>
    Student-/Werknemersnummer: <input type="text" name="nummer" ><br>
    Opleiding Student: <input type="text" name="opleiding"><br>
    <input type="checkbox" name="student"> Student<br>
    <input type="checkbox" name="docent"> Docent<br>
    <input type="checkbox" name="SLB"> Studieloopbaan begeleider<br>
    <input type="checkbox" name="admin"> Admin<br>
    <input type="submit" value="Verstuur">
</form>
</body>
</html>
