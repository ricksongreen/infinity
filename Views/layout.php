<?php
/**
* Created by PhpStorm.
* User: BavFan
* Date: 26/04/2018
* Time: 11:10
*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Infinity</title>
    <style>
        body {
            font-family: Arial;
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
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #748c92;
        }

        .active {
            background-color: #4CAF50;
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


<ul>
    <li><a href="index.php">Home</a></li>
    <?php
    if($_SESSION["rechten"] == 'admin' or $_SESSION["rechten"] == 'slbadmin'){
        echo "<li> <a href='index.php?controller=admin/admin&action=addForm'>Admin</a></li>";
        echo "<li> <a href='index.php?controller=admin/admin&action=showUsers'>Student List</a></li>";
    }?>
    <li style="float:right"><a  href="index.php">T08 Infinity</a></li>
</ul>


<div class="footer">
    <p>&copy; 2018 - Infinity Team 8</p>
</div>

<?php require(APP_PATH . '/routes.php'); ?>

</body>
</html>