<?php
/**
 * Created by PhpStorm.
 * User: ricks
 * Date: 23/05/2018
 * Time: 20:48
 */

function getStudentsFromClass($class){
    global $dbh;
    $stmt = $dbh->prepare("SELECT ID, nummer FROM student WHERE klas_ID = :class");
    $values = array(
        "class" => $class
    );
    $stmt->execute($values);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($students as $student){
        $stmt = $dbh->prepare("SELECT voornaam, tussenvoegsel, achternaam FROM gebruiker WHERE ID =:ID");
        $value = array (
            'ID' => $student['ID']
        );
        $stmt->execute($value);
        $array = $stmt->fetch(PDO::FETCH_ASSOC);
        $array['nummer'] = $student['nummer'];
        $studentArray[] = $array;
    }
    return $studentArray;
}

function getSomeClasses(){
    global $dbh;
    $stmt = $dbh->prepare("SELECT ID, naam FROM klas WHERE something");
}