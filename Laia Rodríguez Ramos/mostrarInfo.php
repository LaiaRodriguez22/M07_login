<?php
    session_start();
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
        echo "ESTIC A MOSTRAR INFO";
        if (isset($_GET['id'])) {
            $user_id = $_GET['id'];
        
            include "dbConf.php";

            $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
            $query = "SELECT user_id, username, surname, email, rol, active  FROM userlaia WHERE user_id = $user_id";
            $result = mysqli_query($connect, $query);
        
            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                echo "Informació detallada de l'usuari:";
                echo "Nom: " . $user['username'] . "<br>";
                echo "Cognom: " . $user['surname'] . "<br>";
                echo "Email: " . $user['email'] . "<br>";
                echo "Rol: " . $user['rol'] . "<br>";
                echo "Actiu: " . $user['active'] . "<br>";
            } else {
                echo "Usuari no trobat o sense permisos per accedir a aquesta informació.";
                header('Location: index.php');
            }
        ?>
            <a href="index.php">Tornar</a>
        <?php
        
        } /*else {
        echo "ID de l'usuari no proporcionat.";
        //TORNEM AL LOGIN
        header('Location: logUser.html');
        }*/  
    ?>
</body>
</html>