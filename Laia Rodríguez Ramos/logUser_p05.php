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

        /*
        define("DB_HOST", "localhost");
        define("DB_NAME", "users");
        define("DB_USER", "root");
        define("DB_PSW", "");
        $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
        */

        // VALORS PER EL FORMULARI
        $password = $_POST["password"];
        $email = $_POST["email"];

        $query = "INSERT INTO userlaia ( password, email) VALUES ('$password', '$email')";

        

    ?>
</body>
</html>