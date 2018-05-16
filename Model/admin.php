<?php
/**
 * User: T08_Infinity
 * Date: 8-5-2018
 * Time: 12:41
 */
function addUser($user) {
    global $dbh;
    /** checks if the username is already stored in the database, so the usernames stay unique */
    try{
        $stmt = $dbh->prepare("SELECT gebruikersnaam FROM gebruiker WHERE gebruikersnaam=:gebruikersnaam");
        $values = array(
            'gebruikersnaam' => $user['gebruikersnaam']
        );
        $stmt->execute($values);
        $doublecheck = $stmt->fetch();
        if(!empty($doublecheck['gebruikersnaam'])){
            throw new Exception("Gebruikersnaam is al in gebruik");
        }
    }catch(Exception $e){
        echo "ERROR: ".$e->getMessage();
        exit;
    }
    /** Sets the user in the database */
    $stmt = $dbh->prepare("INSERT INTO gebruiker (voornaam, tussenvoegsel, achternaam, email, gebruikersnaam, wachtwoord) VALUES(:voornaam, :tussenvoegsel, :achternaam, :email, :gebruikersnaam, :wachtwoord)");
    $storeUser = array(
        'voornaam' => $user['voornaam'],
        'tussenvoegsel' => $user['tussenvoegsel'],
        'achternaam' => $user['achternaam'],
        'email' => $user['email'],
        'gebruikersnaam' => $user['gebruikersnaam'],
        'wachtwoord' => $user['wachtwoord']
    );
    $stmt->execute($storeUser);

    $stmt = $dbh->prepare("SELECT ID FROM gebruiker WHERE gebruikersnaam=:gebruikersnaam");
    $stmt->execute($values);
    $ID = $stmt->fetch();

    if($user['student']==true){
        $stmt = $dbh->prepare("INSERT INTO student(ID, nummer, opleiding) VALUES (:ID, :nummer, :opleiding)");
        $values = array(
            'ID' => $ID['ID'],
            'nummer' => $user['nummer'],
            'opleiding' => $user['opleiding']
        );
        $stmt->execute($values);
    }else{
        /** Sets the data for the SLB and admin, since the database does not correctly use true/false */
        if($user['SLB'] == true) {
            $SLB = 1;
        }else{
            $SLB = 0;
        }
        if($user['admin'] == true){
            $admin = 1;
        }else{
            $admin = 0;
        }
        $stmt = $dbh->prepare("INSERT INTO werknemer(ID, nummer, studentbegeleider, systeembeheerder) VALUES(:ID, :nummer, :studentbegeleider, :systeembeheerder)");
        $values = array(
            'ID' => $ID['ID'],
            'nummer' => $user['nummer'],
            'studentbegeleider' => $SLB,
            'systeembeheerder' => $admin
        );
        $stmt->execute($values);
    }
}

function getAllUsers() {
    /** requests the information of users out of the database*/
    global $dbh;
    return $dbh->query("SELECT gebruikersnaam, voornaam, tussenvoegsel, achternaam FROM gebruiker");
}