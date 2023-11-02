<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
        if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] === true) {
            //SI ES ALUMNE
            if ($_SESSION['rol'] === 'Alumne') {

                echo "<h1>Benvingut, " . $_SESSION["username"] . "! Ets un: " . $_SESSION["rol"] . "</h1>";?>

                <a href="mostrarInfo.php?id=<?php echo $_SESSION["user_id"]; ?> ">Mostrar informacio</a>
                <a href="desconnectar.php">Desconnectar</a>
                
                <?php

            } 
            //SI ES PROFESSOR
            elseif ($_SESSION['rol'] === 'Professor') {

                echo "<h1>Benvingut, " . $_SESSION["username"] . "! Ets un: " . $_SESSION["rol"] . "</h1>";

                $query = "SELECT username, surname, email FROM userlaia";

                include "dbConf.php";
                $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
                $result = mysqli_query($connect, $query);

                echo "<h2>Llista d'usuaris:</h2>";

                //UN ALTRE COP, SI HI HA UN USUARI COM A MINIM, GUARDA AL ARRAY
                if ($result && mysqli_num_rows($result) > 0) {
                    $usuaris = array();
                    
                    //RECORRER LA BBDD USERSLAIA
                    while ($row = mysqli_fetch_assoc($result)) {
                        $usuaris[] = $row;
                    }
                    
                    //GUARDA NOM, COGNOM A L'ARRAY PER LLAVORS IMPRIMIR-HO
                    foreach ($usuaris as $usuari) {
                        $username = $usuari['username'];
                        $surname = $usuari['surname'];
                        $email = $usuari['email'];
                        echo "Nom i cognom: $username $surname <br> Correu: $email <br><br>";
                    }
                }

                ?>
                
                <a href="mostrarInfo.php?id=<?php echo $_SESSION["user_id"]; ?> ">Mostrar informacio</a>
                <a href="desconnectar.php">Desconnectar</a>
                
                <?php
            }
        }
        else{
            header('Location: logUser.html');
        }
    ?>
</body>
</html>