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
    foreach($data as $smallerData){
        $stmt = $dbh->prepare("SELECT naam FROM klas WHERE ID = :ID");
        $value = array (
            'ID' => $smallerData['klas_ID']
        );
        $stmt->execute($value);
        $array = $stmt->fetch();
        $smallerData['klas'] = $array['naam'];
        $dataArray[] = $smallerData;
    }
    return $dataArray;
}

function getLessons(){
    $user = unserialize($_SESSION['user']);
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM lessen WHERE docent_ID =:docent_ID and datum < CURRENT_DATE ");
    $value = array('docent_ID' => $user->ID);
    $stmt->execute($value);
    $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $lessonsClass = [];
    foreach($lessons as $lesson){
        $stmt = $dbh->prepare('SELECT naam FROM klas WHERE ID=:klas_ID');
        $value = array('klas_ID' => $lesson['klas_ID']);
        $stmt->execute($value);
        $array = $stmt->fetch(PDO::FETCH_ASSOC);
        $lesson['klasnaam'] = $array['naam'];
        $lessonsClass[] = $lesson;
    }
    return $lessonsClass;
}

function getPresence($lesson_ID){
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM aanwezigheid WHERE les_ID=:les_ID");
    $value = array('les_ID' => $lesson_ID);
    $stmt->execute($value);
    $presence = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = 0;
    $there = 0;
    foreach($presence as $present) {
        if ($present['aanwezigheid'] === '1') {
            $there++;
        }
        $total++;
    }
    $percentage = round(($there / $total) * 100);
    $text = $percentage . "%";
    return $text;
}