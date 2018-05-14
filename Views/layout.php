<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Infinity</title>
    <style> ul {
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
            background-color: #111;
        }

        .active {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>
<!--<nav>-->
<!--<b> Menu:</b>-->
<!--    <button><a href ='index.php'>Login</a></button>-->
<!--    --><?php
//    if($_SESSION["rechten"] == 'admin' or $_SESSION["rechten"] == 'slbadmin'){
//    echo "<a href='index.php?controller=admin/admin&action=addForm'>Admin</a>";
//    echo "<a href='index.php?controller=admin/admin&action=showUsers'>Student List</a>";
//    }?>
<!--</nav>-->

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="index.php">Login</a></li>
    <?php
    if($_SESSION["rechten"] == 'admin' or $_SESSION["rechten"] == 'slbadmin'){
        echo "<a href='index.php?controller=admin/admin&action=addForm'>Admin</a>";
        echo "<a href='index.php?controller=admin/admin&action=showUsers'>Student List</a>";
    }?>
    <li style="float:right"><a  href="index.php">T08</a></li>
</ul>


<?php require(APP_PATH . '/routes.php'); ?>

<!--<footer>-->
<!--    <br><br>-->
<!--    <hr>-->
<!--    &copy; 2018 - Infinity Team 8-->
<!--</footer>-->

</body>
</html>