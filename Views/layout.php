<?php
/**
* User: T08_Infinity
* Date: 26/04/2018
* Time: 11:10
*/
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="resources/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Infinity</title>
    <style>
        html {
            font-family: Arial, Helvetica, sans-serif;
        }
        div.navbar a
        {
            color: #fff;
            text-decoration: none;
            font: 20px Arial;
            margin: 0px 1px;
            padding: 10px 10px;
            position: relative;
            z-index: 0;
            cursor: pointer;
            font-size: 14px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: transparent;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        div.borderYtoX a:before, div.borderYtoX a:after
        {
            position: absolute;
            opacity: 0.5;
            height: 100%;
            width: 2px;
            content: '';
            background: #FFF;
            transition: all 0.4s;
        }

        div.borderYtoX a:before
        {
            left: 0px;
            top: 0px;
        }

        div.borderYtoX a:after
        {
            right: 0px;
            bottom: 0px;
        }

        div.borderYtoX a:hover:before, div.borderYtoX a:hover:after
        {
            opacity: 1;
            height: 1px;
            width: 100%;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: left;
        }

    </style>
</head>
<body>


<div class="navbar teal borderYtoX">
    <ul>
    <?php
    if($_SESSION["ingelogd"] == true){
        echo "<li><a href='index.php?controller=home&action=homepage'>Home</a></li>";
        if($_SESSION["rechten"] == 'admin' or $_SESSION["rechten"] == 'slbadmin'){
            echo "<li><a href='index.php?controller=admin&action=addForm'>Registratie</a></li>";
            echo "<li><a href='index.php?controller=admin&action=showUsers'>Gebruikerslijst</a></li>";
            echo "<li><a href='index.php?controller=admin&action=addClassForm'>Klassen Aanmaken</a></li>";
            echo "<li><a href='index.php?controller=admin&action=addLessonForm'>Les Aanmaken</a></li>";
        }
        if($_SESSION["rechten"] == 'admin' or $_SESSION["rechten"] == 'slbadmin' or $_SESSION["rechten"] == 'docent' or $_SESSION["rechten"] == 'slb'){
            echo "<li> <a href='index.php?controller=teacher&action=showClass'>Klassenlijst</a>";
        }
        echo "<li style='float:right'> <a href='index.php?controller=home&action=logout'>Log out</a>";
        echo "<li style=\"float:right\"><a  href='index.php?controller=home&action=homepage'>T08 Infinity</a>";
    } ?>
    </ul>
</div>



<div class="footer">
    <p>&copy; 2018 - Infinity Team 8</p>
</div>

<?php require(APP_PATH . '/routes.php'); ?>

</body>
</html>