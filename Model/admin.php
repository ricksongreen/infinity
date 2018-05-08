<?php
/**
 * Created by PhpStorm.
 * User: stene
 * Date: 8-5-2018
 * Time: 12:41
 */
function addUser($gebruiker) {
    global $dbh;

    $stmt = $dbh->prepare("INSERT INTO gebruiker (voornaam, tussenvoegsel, achternaam, email, gebruikersnaam, wachtwoord) VALUES(:voornaam, :tussenvoegsel, :achternaam, :email, :gebruikersnaam, :wachtwoord)");

    return $stmt->execute($gebruiker);
}