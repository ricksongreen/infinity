<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Infinity</title>
</head>

<nav><hr>
<b> Menu:</b>
<button>Home</button>
    <button><a href ='index.php'>Login</a></button>
    <?php
    if($_SESSION["rechten"] == 'admin' or $_SESSION["rechten"] == 'slbadmin'){
    echo "<a href='index.php?controller=admin/admin&action=addForm'>Admin</a>";
    echo "<a href='index.php?controller=admin/admin&action=showUsers'>Student List</a>";
    }?>
<hr></nav>
<br />
<?php require(APP_PATH . '/routes.php'); ?>

<!--<footer>-->
<!--    <br><br>-->
<!--    <hr>-->
<!--    &copy; 2018 - Infinity Team 8-->
<!--</footer>-->
</html>