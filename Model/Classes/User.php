<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 26/04/2018
 * Time: 11:29
 */

class User{
    private $username;
    private $password;

    public function __construct($user, $pass) {
        if(empty($this->password)) {
            $this->password = password_hash($pw, PASSWORD_DEFAULT);
        }
        $this->username = $user;
    }

    public function PasswordHash($pw){
        if(empty($this->password)) {
            $this->password = password_hash($pw, PASSWORD_DEFAULT);
        }
    }

    public function Login(){
        $stmt = $dbh->prepare('SELECT wachtwoord FROM gebruiker WHERE gebruikersnaam = :user');

        $values = array (
            'user' => $this->username
        );

        $stmt->execute($values);
        $realpassword = $stmt->fetch();

        /**@throws exception when username does not exist in the database
         * @throws exception when password is false, allows user to continue if correct
         **/
        if(!isset($realpassword)) {
            throw new Exception("Gebruiker niet gevonden");
        }elseif($this->password == $realpassword){
            return "true";
        }else{
            throw new Exception("Wachtwoord is incorrect");
        }
    }

    public function GetName(){
        $stmt = $dbh->prepare('SELECT voornaam, tussenvoegsel, achternaam FROM gebruiker WHERE gebruikersnaam = :user');

        $values = array (
            'user' => $this->username
        );

        $stmt->execute($values);
        $name = $stmt->fetch();

    }
}

