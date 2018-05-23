<?php
/**
 * User: T08_Infinity
 * Date: 26/04/2018
 * Time: 11:29
 */

class User{
    public $username;


    public function __construct($user, $pass) {
        /** Sets the username of the User in the Class */
        $this->username = $user;
        /** Retrieves info from database */
        global $dbh;
        /** Retrieves password from database */
        $stmt = $dbh->prepare("SELECT wachtwoord FROM gebruiker WHERE gebruikersnaam=:user");
        $values = array (
            'user' => $this->username
        );
        $stmt->execute($values);
        $realpassword = $stmt->fetch();

        if(!isset($realpassword['wachtwoord'])){
            header('Location: index.php');
        }elseif(password_verify($pass, $realpassword['wachtwoord']) == false){
            header('Location: index.php');
        }else{
            $this->getRights();
            $_SESSION['ingelogd'] = true;
            header('Location:index.php?controller=home&action=homepage');
        }
    }

    /** hashes a given password and returns it */
    public function passwordHash($pw){
        return password_hash($pw, PASSWORD_DEFAULT);
    }

    /** retrieves the user's name from the database */
    public function getName(){
        global $dbh;
        $stmt = $dbh->prepare("SELECT voornaam, tussenvoegsel, achternaam FROM gebruiker WHERE gebruikersnaam=:user");

        $values = array(
            'user' => $this->username
        );

        $stmt->execute($values);
        $name = $stmt->fetch();
    }

    /** since the usernames are unique, the matching ID's can be retrieves via the username */
    public function getID(){
        global $dbh;
        $stmt = $dbh->prepare("SELECT ID FROM gebruiker WHERE gebruikersnaam=:gebruikersnaam");
        $values = array(
            'gebruikersnaam' => $this->username
        );
        $stmt->execute($values);
        $id = $stmt->fetch();
        return $id['ID'];
    }

    /** checks the database to see what rights users have */
    public function getRights(){
        global $dbh;
        $id = $this->getID();
        $stmt = $dbh->prepare("SELECT nummer FROM student WHERE ID=:ID");
        $values = array(
            'ID' => $id
        );
        $stmt->execute($values);
        $student = $stmt->fetch();
        $stmt = $dbh->prepare("SELECT studentbegeleider, systeembeheerder FROM werknemer WHERE ID=:ID");
        $stmt->execute($values);
        $werknemer = $stmt->fetch();

        if(!empty($student['nummer'])){
            $_SESSION["rechten"] = 'student';
        }elseif($werknemer['studentbegeleider'] == 0 && $werknemer['systeembeheerder'] == 0){
            $_SESSION["rechten"] = 'docent';
        }elseif($werknemer['studentbegeleider'] == 1 && $werknemer['systeembeheerder'] == 0){
            $_SESSION["rechten"] = 'slb';
        }elseif($werknemer['studentbegeleider'] == 0 && $werknemer['systeembeheerder'] == 1){
            $_SESSION["rechten"] = 'admin';
        }elseif($werknemer['studentbegeleider'] == 1 && $werknemer['systeembeheerder'] == 1){
            $_SESSION["rechten"] = 'slbadmin';
        }
    }

    public function getStudentsFromClass($class){
        global $dbh;
        $stmt = $dbh->prepare("SELECT ID, nummer FROM student WHERE klas_ID = :class");
        $values = array(
            "class" => $class
        );
        $stmt->execute($values);
        $studenten = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $studenten;
    }
}

