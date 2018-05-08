<?php
/**
 * Created by PhpStorm.
 * User: stene
 * Date: 8-5-2018
 * Time: 12:41
 */
function addUser($user) {
    global $dbh;

    $stmt = $dbh->prepare("INSERT INTO user (first_name, last_name, password, country, email, Admin) VALUES(:first_name, :last_name, :password, :country, :email, :Admin)");

    return $stmt->execute($customer);
}