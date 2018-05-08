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
<form method="post" action=>
    Student-/Docentnummer: <input type="text" name="number" required><br>
    <input type="radio" name="functie" value="Docent" checked> Docent<br>
    <input type="radio" name="functie" value="Student"> Student<br>
    <input type="radio" name="functie" value="SLgit B"> SLB
    Wachtwoord: <input type="password" name="password" required><br>
    Email: <input type="email" name="email" required><br>
    Voornaam: <input type="text" name="voornaam" required><br>
    Tussenvoegsel: <input type="text" name="tussenvoegsel"><br>
    Achternaam: <input type="text" name="achternaam" required><br>
    Opleiding: <input type="text" name="opleiding"><br>
</form>
</body>
</html>
