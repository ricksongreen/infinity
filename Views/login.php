<?php
/**
 * User: T08_Infinity
 * Date: 26/04/2018
 * Time: 11:10
 */
if($_SESSION['ingelogd'] == true){
    header('Location: index.php?controller=home&action=homepage');
}
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="loginbox">
    <img src="resources/avatar1.jpg" class="avatar">
    <h1>Login</h1>
    <form method="post" action="index.php?controller=home&action=loginhandler">
        <p>Gebruikersnaam</p>
        <input type="text" name="username" placeholder="Gebruikersnaam" id="key" required><br><br>
        <p>Wachtwoord</p>
        <input type="password" name="password" placeholder="Wachtwoord" required>
        <input type="submit" value="Login">
    </form>
</div>



</body>
</html>
