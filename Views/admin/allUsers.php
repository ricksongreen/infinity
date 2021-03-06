<?php
/**
 * Created by PhpStorm.
 * User: T08_Infinity
 * Date: 25/04/2018
 * Time: 10:39
 */
?>

<html>
<head>
    <title>Infinity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: transparent;
            background-image: url("/htdocs/resources/avatar1.jpg");
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        input[type=text]:focus {
            width: 100%;
        }
    </style>
</head>

<body>
<h1>Gebruikers</h1>

<form action="index.php?controller=admin&action=search" method="POST">
    <input type="text" name="query" id="myInput" onkeyup="search()" placeholder="Zoek..." title="Type in a name">
</form>


    <table id="customers" class="customers">
    <thead>
    <tr>
        <th>Gebruikersnaam</th>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Verwijder</th>
    </tr>
    </thead>
    <!-- Uses the information from the array and creates a table based on that information -->
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user['gebruikersnaam'] ?></td>
            <td><?php echo $user['voornaam'] ?></td>
            <td><?php echo $user['tussenvoegsel'] ?></td>
            <td><?php echo $user['achternaam'] ?></td>
            <td><a href="index.php?controller=admin&action=delete&id=<?php echo $user['ID']; ?>"><img src="resources/delete.png" width="25px" height="25px" >
            </td>
        </tr>
    <?php } ?>
</table>
<script>
    //Filters the list of users and refreshes the lists instantly
    function search() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("customers");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
</div>
</html>
