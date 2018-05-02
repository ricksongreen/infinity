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


    public function PasswordHash($pw){
        if(empty($this->password)) {
            $this->password = password_hash($pw, PASSWORD_DEFAULT);
        }
    }

    public function Login($user){
        $stmt = $dbh->prepare('SELECT wachtwoord FROM gebruiker WHERE gebruikersnaam = :user');

    }
}
