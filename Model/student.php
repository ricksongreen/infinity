<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 24/05/2018
 * Time: 11:41
 */

function getScheduleStu(){
    $user = unserialize($_SESSION['user']);
    global $dbh;
    $stmt = $dbh->prepare("SELECT klas_ID FROM student WHERE ID=:ID");
    $values = array (
        'ID' => $user->ID
    );
    $stmt->execute($values);
    $klas_ID = $stmt->fetch();
    $stmt = $dbh->prepare("SELECT * FROM lessen WHERE klas_ID =:ID ORDER BY datum, begintijd ASC");
    $values = array (
        'ID' => $klas_ID['klas_ID']
    );
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
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