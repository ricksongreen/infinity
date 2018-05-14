<?php
/**
 * Created by PhpStorm.
 * User: ricksongreen
 * Date: 25/04/2018
 * Time: 10:39
 */
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>

<form method="post" action="index.php?controller=admin/admin&action=add">
    <div class="container">
        <h1>Infinity Registratie</h1>
        <label for="email"><b>Voornaam</b> <input type="text" name="voornaam" required><br>
            <b>Tussenvoegsel</b> <input type="text" name="tussenvoegsel"><br>
            <b>Achternaam</b> <input type="text" name="achternaam" required><br>
            <b>Email</b> <input type="text" name="email" required><br>
            <b>Gebruikernaam</b> <input type="text" name="gebruikersnaam" required><br>
            <b>Wachtwoord</b> <input type="password" name="wachtwoord" required><br>
            <b>Student-/Werknemersnummer</b> <input type="text" name="nummer" ><br>
            <b>Opleiding Student</b> <input type="text" name="opleiding"><br>
            <input type="checkbox" name="student"> Student<br>
            <input type="checkbox" name="docent"> Docent<br>
            <input type="checkbox" name="SLB"> Studieloopbaan begeleider<br>
            <input type="checkbox" name="admin"> Admin<br>
            <input type="submit" value="Verstuur">
    </div>
</form>