<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 26/04/2018
 * Time: 11:29
 */

class User{
    public $username;

    public function __construct($user, $pass) {
        /** Sets the username of the User in the Class */
        $this->username = $user;

        global $dbh;

        $stmt = $dbh->prepare("SELECT wachtwoord FROM gebruiker WHERE gebruikersnaam=:user");
        $values = array (
            'user' => $this->username
        );
        $stmt->execute($values);
        $realpassword = $stmt->fetch();

        try{
            if(!isset($realpassword)){
                throw new Exception("Gebruiker niet gevonden");
            }
            if(password_verify($pass, $realpassword['wachtwoord']) == false){
                throw new Exception("Het ingevoerde wachtwoord is incorrect");
            }
        }catch (Exception $e) {
            echo "ERROR: ".$e->getMessage();
            exit;
        }
    }

    public function PasswordHash($pw){
        return password_hash($pw, PASSWORD_DEFAULT);
    }

    public function GetName(){
        global $dbh;
        $stmt = $dbh->prepare("SELECT voornaam, tussenvoegsel, achternaam FROM gebruiker WHERE gebruikersnaam=:user");

        $values = array (
            'user' => $this->username
        );

        $stmt->execute($values);
        $name = $stmt->fetch();

    }
}

