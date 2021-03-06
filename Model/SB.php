<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 30/05/2018
 * Time: 14:01
 */

function getAllStudents(){
    global $dbh;
    /** Retrieves all the students from the database */
    $stmt = $dbh->query("SELECT * FROM student");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $i = 0;
    $array = [];
    /** foreach students retrieves the names from the user list in the database */
    foreach($students as $student) {
        $stmt = $dbh->prepare("SELECT voornaam, tussenvoegsel, achternaam FROM gebruiker WHERE ID=:ID");
        $value = array('ID' => $student['ID']);
        $stmt->execute($value);
        $users = $stmt->fetch(PDO::FETCH_ASSOC);
        $i++;
        $student['voornaam'] = $users['voornaam'];
        $student['tussenvoegsel'] = $users['tussenvoegsel'];
        $student['achternaam'] = $users['achternaam'];
        $array[] = $student;
    }
    return $array;
}

function presence($id){
    global $dbh;
    /** retrieves all the lessons where the presence has been registered for for the student_ID that has been given with the function call */
    $stmt = $dbh->prepare("SELECT aanwezigheid, les_ID FROM aanwezigheid WHERE student_ID=:student_ID");
    $values = array('student_ID' => $id);
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function calculate(){
    /** calculates the total number of lessons where the student was present
     * @returns $information (total amount of lessons and the amount of lessons he was present) */
    $students = getAllStudents();
    $information = [];
    foreach ($students as $student) {
        $presence = presence($student['ID']);
        $total = 0;
        $lessons = 0;
        foreach ($presence as $present) {
            if ($present['aanwezigheid'] === '1') {
                $total++;
            }
            $lessons++;
        }
        $student['total'] = $total;
        $student['lessons'] = $lessons;
        $information[] = $student;
    }
    return $information;
}