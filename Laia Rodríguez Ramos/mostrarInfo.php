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
        if (isset($_GET["id"])) {
            $user_id = $_GET["id"];
        
            include "dbConf.php";

            $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
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
        ?>
            <a href="index.php">Tornar</a>
        <?php
        
        } else {
        echo "ID de l'usuari no proporcionat.";
        //TORNEM AL LOGIN
        header('Location: logUser.html');
        }  
    ?>
</body>
</html>