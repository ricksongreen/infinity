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
    <!--Student-/Docentnummer: <input type="text" name="number" ><br>
    Opleiding: <input type="text" name="opleiding">
    <input type="radio" name="functie" value="docent" checked> Docent<br>
    <input type="radio" name="functie" value="student"> Student<br>
   <input type="radio" name="functie" value="SLB"> SLB <br><br><br>--><Br>
    <input type="submit" value="Verstuur">
</form>
</body>
</html>
