<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
            include "dbConfig.php";

            try{
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
                $query = "SELECT * FROM user WHERE user_id = '$user_id' ";
                $resultat = mysqli_query($connect, $query);
                if($resultat){
                    $numUsers = mysqli_num_rows(($resultat));
                    if ($numUsers > 0) {
                        $users = mysqli_fetch_array($resultat);

                        echo "Informació detallada de l'usuari";
                        echo "Id usuari: " . $user['user_id'] . "<br>";
                        echo "Nom: " . $user['name'] . "<br>";
                        echo "Cognom: " . $user['surname'] . "<br>";
                        echo "Email: " . $user['email'] . "<br>";
                        echo "Rol: " . $user['rol'] . "<br>";
                        echo "Actiu: " . $user['active'] . "<br>";

                    } else {
                        include "loginForm.html";
                        echo "Error en el login";
                    }

                }
                else {
                    throw new Exception("Error en la consulta: " . mysqli_error($connect));
                }
            }catch (Exception $e) {
                echo 'Se produjo una excepción: ' . $e->getMessage();
            }
        ?>
            <a href="index.php">Tornar</a>
        <?php
        
        } 
            ?>
</body>
</html>