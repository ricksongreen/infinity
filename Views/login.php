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
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="loginbox">
    <img src="resources/avatar1.jpg" class="avatar">
    <h1>Login</h1>
    <form method="post" action="index.php?controller=home&action=loginhandler">
        <p>Username</p><br>
        <input type="text" name="username" placeholder="Enter Username" id="key" required><br><br>
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="submit">
    </form>
</div>



</body>
</html>
