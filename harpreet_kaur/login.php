<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $correo = $_POST['email'];
    $password = $_POST['contrasenya'];

    echo   $correo . " " . $password;
    ?>

    <?php

    define("DB_HOST", "localhost");
    define("DB_NAME", "users");
    define("DB_USER", "root");
    define("DB_PSW", "");
    define("DB_PORT", 3306);
    $conexionBD = null;  


    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    if (!$connect) {
        echo "ERROR!!!!" . mysqli_connect_error();
    } else {
        $query = "SELECT user_id, name, surname, password, email FROM user WHERE rol LIKE 'alumnat' ";
        $conexionBD = mysqli_query($connect, $query);
    }

    if ($conexionBD) {
        header('Location: resultado.php');
    } else {
        echo "Error: " . mysqli_error($connect);
    }

    ?>

</body>

</html>