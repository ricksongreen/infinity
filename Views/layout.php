<!DOCTYPE html>
<html>
<head>
    <title>Infinity</title>
</head>

<header>
    <h1><b>Infinity</b></h1>
</header>

<nav><hr>
<b> Menu:</b>
<button>Home</button>
<button>Login</button>
    <?php
    require_once (APP_PATH . '/Model/Classes/User.php');
    $person = new User('TEST', 'TEST123');
    if($person->getRights() == 'admin' or 'slbadmin'){
        echo "<a href='index.php?controller=admin/admin&action=addForm'>Admin</a>";
    }
    ?>
<hr></nav>
<br />
<?php require(APP_PATH . '/routes.php'); ?>

<footer>
    <br><br>
    <hr>
    &copy; 2018 - Infinity Team 8
</footer>
</html>
