<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 24/05/2018
 * Time: 11:41
 */

/** retrieves the schedule information of the student
 * @return array with that information */
function getScheduleStu(){
    $user = unserialize($_SESSION['user']);
    global $dbh;
    /** retrieves klas_ID */
    $stmt = $dbh->prepare("SELECT klas_ID FROM student WHERE ID=:ID");
    $values = array (
        'ID' => $user->ID
    );
    $stmt->execute($values);
    $klas_ID = $stmt->fetch();
    $stmt = $dbh->prepare("SELECT * FROM lessen WHERE klas_ID =:ID AND datum=:datum ORDER BY datum, begintijd ASC");
    $values = array (
        'ID' => $klas_ID['klas_ID'],
        'datum' => date("Y-m-d")
    );
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    /** gets the nummers of the teachers instead of the ID */
    foreach($data as $da){
        $stmt = $dbh->prepare("SELECT nummer FROM werknemer WHERE ID = :ID");
        $value = array (
            'ID' => $da['docent_ID']
        );
        $stmt->execute($value);
        $array = $stmt->fetch();
        $da['nummer'] = $array['nummer'];
        $dataArray[] = $da;
    }
    return $dataArray;
}

function registerStudent(){
    $user = unserialize($_SESSION['user']);
    $start = new DateTime($_POST['startTime']);
    $time = new DateTime(date("h:i:s"));
    $hours = $start->diff($time);
    $minutes = $hours->format("%H:%I:%S");
    if(strtotime("1970-01-01 $minutes UTC") < 300){
        $aanwezigheid = '1';
    }else{
        $aanwezigheid = '0';
    }
    global $dbh;
    $stmt = $dbh->prepare("INSERT INTO aanwezigheid(aanwezigheid, tijd, student_ID, les_ID) VALUES(:aanwezigheid, :tijd, :student_ID, :les_ID)");
    $values = array(
        'aanwezigheid' => $aanwezigheid,
        'tijd' => date("Y-m-d-h-i-s"),
        'student_ID' => $user->ID,
        'les_ID' => $_POST['ID']
    );
    $stmt->execute($values);
}

function registered($id){
    $user = unserialize($_SESSION['user']);
    global $dbh;
    $stmt = $dbh->prepare("SELECT aanwezigheid FROM aanwezigheid WHERE student_ID=:student_ID AND les_ID=:les_ID");
    $values = array(
        'student_ID' => $user->ID,
        'les_ID' => $id
    );
    $stmt->execute($values);
    $trueFalse = $stmt->fetch(PDO::FETCH_ASSOC);
    return $trueFalse;
}

function timeConvert(){

}