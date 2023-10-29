<?php
//start the session
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
        <!--Captura de les dades a través de l'acció Post i formulari Login.html-->
        <?php
        $correo = $_POST['email'];
        $password = $_POST['contrasenya'];

        
        ?>

        <!--Totes les dades de la conexió estan declarats en el fitxer dbConfig -->
        <?php
        include "dbConfig.php";
        $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

        //Trucada a la funció principal
        verifyUser($connect, $correo, $password);

        function verifyUser($connect, $correo, $password)
        {
            try {
                $query = "SELECT user_id, email, password, rol, name, surname FROM user WHERE email = '$correo' AND password = '$password'";
                $users = mysqli_query($connect, $query);
                if ($users) {
                    $numUsers = mysqli_num_rows(($users));
                    if ($numUsers > 0) {
                        $resultat = mysqli_fetch_array($users);
                        $_SESSION["isLogged"] = true;
                        $_SESSION["name"] = $resultat["name"];
                        $_SESSION["role"] = $resultat["rol"];
                        $_SESSION["user_id"] = $resultat["user_id"];
                        header('Location: index.php');

                    } else {
                        include "loginForm.html";
                        echo "Error en el login";
                    }
                } else {
                    throw new Exception("Error en la consulta: " . mysqli_error($connect));
                }
            } catch (Exception $e) {
                echo 'Se produjo una excepción: ' . $e->getMessage();
            }
        } //function
        ?>
    </body>
</html>