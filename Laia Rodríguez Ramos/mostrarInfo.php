<?php
    session_start();
    include "dbConf.php";
    include "idioma.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar informacio usuari</title>
</head>
<body>
    <?php
        if (!isset($_COOKIE[$cookieLang])) {
            //echo 'La cookie es la default. CAT.';
            //setcookie($cookieLang, $cookieCat, $tempsDuracio);
            //AQUI AL FER EL SETCOOKIE, ES FEIA EL BUCLE AMB DELETE I PER AIXO
            //LA COOKIE NO S'ESBORRABA MAI.
            cookieShowInfoDefault();
        } else if(isset($_COOKIE[$cookieLang])){
            if($_COOKIE[$cookieLang] == "es"){
                cookieShowInfoEs();
            }
            else if($_COOKIE[$cookieLang] == "cat"){
                cookieShowInfoCat();
            }
            else if($_COOKIE[$cookieLang] == "en"){
                cookieShowInfoEn();
            }
        }

        //DEFAULT
        function cookieShowInfoDefault() {
            if (isset($_GET["id"])) {
                $user_id = $_GET["id"];
        
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);
                $query = "SELECT * FROM userlaia WHERE user_id = '$user_id'";
        
                $result = mysqli_query($connect, $query);
        
                if ($result && mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                    echo "<h1>Informació detallada de l'usuari:</h1><br>";
                    echo "<b>Nom:</b> " . $user['username'] . "<br>";
                    echo "<b>Cognom:</b> " . $user['surname'] . "<br>";
                    echo "<b>Email:</b> " . $user['email'] . "<br>";
                    echo "<b>Rol:</b> " . $user['rol'] . "<br>";
                    echo "<b>Actiu: </b>" . $user['active'] . "<br><br>";
                } else {
                    echo "Usuari no trobat o sense permisos per accedir a aquesta informació.";
                    header('Location: index.php');
                }
                echo '<a href="index.php">Tornar</a>';
            } else {
                echo "ID de l'usuari no proporcionat.";
                // TORNEM AL LOGIN
                header('Location: logUser.html');
            }
        }

        //CATALA
        function cookieShowInfoCat() {
            if (isset($_GET["id"])) {
                $user_id = $_GET["id"];
        
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);
                $query = "SELECT * FROM userlaia WHERE user_id = '$user_id'";
        
                $result = mysqli_query($connect, $query);
        
                if ($result && mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                    echo "<h1>Informació detallada de l'usuari:</h1><br>";
                    echo "<b>Nom:</b> " . $user['username'] . "<br>";
                    echo "<b>Cognom:</b> " . $user['surname'] . "<br>";
                    echo "<b>Email:</b> " . $user['email'] . "<br>";
                    echo "<b>Rol:</b> " . $user['rol'] . "<br>";
                    echo "<b>Actiu: </b>" . $user['active'] . "<br><br>";
                } else {
                    echo "Usuari no trobat o sense permisos per accedir a aquesta informació.";
                    header('Location: index.php');
                }
                echo '<a href="index.php">Tornar</a>';
            } else {
                echo "ID de l'usuari no proporcionat.";
                // TORNEM AL LOGIN
                header('Location: logUser.html');
            }
        }

        //CASTELLA
        function cookieShowInfoEs() {
            if (isset($_GET["id"])) {
                $user_id = $_GET["id"];
        
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);
                $query = "SELECT * FROM userlaia WHERE user_id = '$user_id'";
        
                $result = mysqli_query($connect, $query);
        
                if ($result && mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                    echo "<h1>Información detallada del usuario:</h1><br>";
                    echo "<b>Nombre:</b> " . $user['username'] . "<br>";
                    echo "<b>Apellido:</b> " . $user['surname'] . "<br>";
                    echo "<b>Email:</b> " . $user['email'] . "<br>";
                    echo "<b>Rol:</b> " . $user['rol'] . "<br>";
                    echo "<b>Activo: </b>" . $user['active'] . "<br><br>";
                } else {
                    echo "UsuariO no encontrado o sin permisos para acceder en este bloque de información.";
                    header('Location: index.php');
                }
                echo '<a href="index.php">Volver</a>';
            } else {
                echo "ID del usuario no proporcionado";
                // TORNEM AL LOGIN
                header('Location: logUser.html');
            }
        }

        //ENGLISH
        function cookieShowInfoEn() {
            if (isset($_GET["id"])) {
                $user_id = $_GET["id"];
        
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);
                $query = "SELECT * FROM userlaia WHERE user_id = '$user_id'";
        
                $result = mysqli_query($connect, $query);
        
                if ($result && mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                    echo "<h1>Informació detallada de l'usuari:</h1><br>";
                    echo "<b>Name:</b> " . $user['username'] . "<br>";
                    echo "<b>Surname:</b> " . $user['surname'] . "<br>";
                    echo "<b>Email:</b> " . $user['email'] . "<br>";
                    echo "<b>Rol:</b> " . $user['rol'] . "<br>";
                    echo "<b>Active: </b>" . $user['active'] . "<br><br>";
                } else {
                    echo "Usuari no trobat o sense permisos per accedir a aquesta informació.";
                    header('Location: index.php');
                }
                echo '<a href="index.php">Return</a>';
            } else {
                echo "ID de l'usuari no proporcionat.";
                // TORNEM AL LOGIN
                header('Location: logUser.html');
            }
        }

        ?>
</body>
</html>