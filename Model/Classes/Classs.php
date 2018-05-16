<?php
/**
 * User: T08_Infinity
 * Date: 25/04/2018
 * Time: 11:31
 */

class Classs{
    private $className;


    public function getStudentList($class){
        $stmt = $dbh->prepare("SELECT studentNummer, voornaam, tussenvoegsel, achternaam FROM Studenten WHERE Klas=$class GROUP BY gebruiker.studenten_ID");
        $result = $stmt->execute();
        return $result;

    }

}
