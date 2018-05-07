<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 03/05/2018
 * Time: 12:19
 */

session_start();

// the location where the Infinity files are stored
define('APP_PATH', 'C:/xampp/infinity');

// create a db connection
// require_once(APP_PATH .'/Model/db_connection.php');

// show layout of Infinity
require_once(APP_PATH .'/Views/layout.php');

