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
    global $rechten;
    if($rechten == 'admin' or $rechten == 'slbadmin'){
    echo "<a href='index.php?controller=admin/admin&action=addForm'>Admin</a>";
    }?>
<hr></nav>
<br />
<?php require(APP_PATH . '/routes.php'); ?>

<footer>
    <br><br>
    <hr>
    &copy; 2018 - Infinity Team 8
</footer>
</html>
