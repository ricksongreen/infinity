<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 26/04/2018
 * Time: 11:53
 */

try {
    $dbh = new PDO('mysql:host=localhost;dbname=t08er1718_t08',
        't08er1718_t08',
        'infinity',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    die(json_encode(array('outcome' => true)));
}catch(PDOException $exception){
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}


//$message = $dbh->query("Select * FROM gebruiker");
//print_r($message);