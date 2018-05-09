<?php
/**
 * Created by PhpStorm.
 * User: stene
 * Date: 8-5-2018
 * Time: 12:41
 */
function addUser($user) {
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT gebruikersnaam FROM gebruiker WHERE gebruikersnaam=:gebruikersnaam");
        $values = array(
            $gebruikersnaam = $user['gebruikersnaam'];
        )
        $doublecheck = $stmt->execute($values);
        if(!empty($doublecheck)){
            throw new Exception("Gebruikersnaam is al in gebruik");
        }
    }catch(Exception $e){
        echo "ERROR: ".$e->getMessage();
        exit;
    }
    $stmt = $dbh->prepare("INSERT INTO gebruiker (voornaam, tussenvoegsel, achternaam, email, gebruikersnaam, wachtwoord) VALUES(:voornaam, :tussenvoegsel, :achternaam, :email, :gebruikersnaam, :wachtwoord)");

    $stmt->execute($user);

    $stmt = $dbh->prepare("SELECT ID FROM gebruiker WHERE gebruikersnaam=:gebruikersnaam");
    $stmt->execute($values);
    $ID = $stmt->fetch();

    //if

    //$stmt = $dbh->prepare("")
}