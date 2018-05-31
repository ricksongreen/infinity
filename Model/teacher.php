<?php
/**
 * Created by PhpStorm.
 * User: ricks
 * Date: 23/05/2018
 * Time: 20:48
 */

/** takes an ID from a class and uses that information to retrieve all the students from said class
 * @return array with IDs, numbers and names of the students from the given class */
function getStudentsFromClass($class){
    global $dbh;
    $stmt = $dbh->prepare("SELECT ID, nummer FROM student WHERE klas_ID = :class");
    $values = array(
        "class" => $class
    );
    $stmt->execute($values);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $studentArray = [];
    /** retrieves the name of the student via the ID which was found in the last call to the database and sets it together in one array*/
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

/** uses the $_SESSION variable user to get the ID which can be used to get the lessons which are connected to the teacher
 * @return array with information of the schedule of the teacher */
function getScheduleTea(){
    $user = unserialize($_SESSION['user']);
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM lessen WHERE docent_ID =:ID AND datum=:datum ORDER BY datum, begintijd ASC");
    $values = array (
        'ID' => $user->ID,
        'datum' => date("Y-m-d")
    );
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    /** gets the class name instead of the ID */
    $dataArray = [];
    foreach($data as $da){
        $stmt = $dbh->prepare("SELECT naam FROM klas WHERE ID = :ID");
        $value = array (
            'ID' => $da['klas_ID']
        );
        $stmt->execute($value);
        $array = $stmt->fetch();
        $da['klas'] = $array['naam'];
        $dataArray[] = $da;
    }
    return $dataArray;
}