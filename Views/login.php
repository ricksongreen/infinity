<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 26/04/2018
 * Time: 11:10
 */
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>
        Login Infinity
    </title>
</head>
<body>
    <h1>
        Login Infinity
    </h1>
<form method="post" action="index.php?controller=home&action=loginhandler">
    Gebruikersnaam: <input type="text" name="username" required><br><br>
    Wachtwoord: <input type="password" name="password" required><br><br>
    <input type="submit" value="Log in">
</form>
</body>
</html>
