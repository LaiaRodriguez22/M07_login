<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "dbConf.php";
        $_SESSION["isLogged"] = false;
        
        //PROVA.
        $_SESSION["correu"] = $email;
        $_SESSION["name"] = $name;
        print_r($_SESSION["name"]); 

        if(isset($_SESSION["isLogged"])){
            print_r($_SESSION["name"]); 
        } else{
            include "logUser.html";
            echo "<br> No he fet cap login <br>";
            session_unset();
            session_destroy(); 
        }
    ?>
</body>
</html>