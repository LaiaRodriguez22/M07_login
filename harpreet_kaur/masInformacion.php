<?php
    session_start();
    include "dbConfig.php";
    include "idioma.php";
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
    //Mateixa estructura que l'index.php, depenent del valor es mostra informació en el llenguatge especificat.
    if(isset($_COOKIE['cookieIdioma'])){
        if($_COOKIE['cookieIdioma'] == "cat"){
            masInfoCat();
        }
        else if($_COOKIE['cookieIdioma'] == "es"){
            masInfoEs();
        }
        else if($_COOKIE['cookieIdioma'] == "en"){
            masInfoEn();
        }
    }else{
        masInfoPorDefecto();            
    }

    function masInfoCat(){
        if (isset($_GET["id"])) {
            //Es guarda el user_id en la variable, per utilitzar-la després. 
            $user_id = $_GET['id'];
            // consulta per mostrar l'informació completa de l'usuari, tenint en compte el userId.
            try{
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
                $query = "SELECT * FROM user WHERE user_id = '$user_id' ";
                $resultat = mysqli_query($connect, $query);
                if($resultat){
                    $numUsers = mysqli_num_rows(($resultat));
                    if ($numUsers > 0) {
                        $user = mysqli_fetch_array($resultat);

                        echo "Informació detallada de l'usuari. <br>"; 
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
                    //Si es un error de la conexió, retorna una excepció
                    throw new Exception("Error en la consulta: " . mysqli_error($connect));
                }
            }catch (Exception $e) {
                //El captura l'excepció, amb el missatge personalitazat
                echo 'Se produjo una excepción: ' . $e->getMessage();
            }
        ?>
            <a href="index.php">Tornar</a>
        <?php        
        } else{
            echo "Error, no s'ha entrat en el primer if";}

    }
    function masInfoEs(){
        if (isset($_GET["id"])) {
            //Es guarda el user_id en la variable, per utilitzar-la després. 
            $user_id = $_GET['id'];            
            // consulta per mostrar l'informació completa de l'usuari, tenint en compte el userId.
            try{
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
                $query = "SELECT * FROM user WHERE user_id = '$user_id' ";
                $resultat = mysqli_query($connect, $query);
                if($resultat){
                    $numUsers = mysqli_num_rows(($resultat));
                    if ($numUsers > 0) {
                        $user = mysqli_fetch_array($resultat);

                        echo "Información detallada del usuario. <br>"; 
                        echo "Id usuario: " . $user['user_id'] . "<br>";
                        echo "Nombre: " . $user['name'] . "<br>";
                        echo "Apellido: " . $user['surname'] . "<br>";
                        echo "Email: " . $user['email'] . "<br>";
                        echo "Rol: " . $user['rol'] . "<br>";
                        echo "Activo: " . $user['active'] . "<br>";

                    } else {
                        include "loginForm.html";
                        echo "Error en el login";
                    }
                }
                else {
                    //Si es un error de la conexió, retorna una excepció
                    throw new Exception("Error en la consulta: " . mysqli_error($connect));
                }
            }catch (Exception $e) {
                //El captura l'excepció, amb el missatge personalitazat
                echo 'Se produjo una excepción: ' . $e->getMessage();
            }
        ?>
            <a href="index.php">Volver</a>
        <?php        
        } else{
            echo "Error, no s'ha entrat en el primer if";}

    }
    function masInfoEn(){
        if (isset($_GET["id"])) {
            //Es guarda el user_id en la variable, per utilitzar-la després. 
            $user_id = $_GET['id'];
            // consulta per mostrar l'informació completa de l'usuari, tenint en compte el userId.
            try{
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
                $query = "SELECT * FROM user WHERE user_id = '$user_id' ";
                $resultat = mysqli_query($connect, $query);
                if($resultat){
                    $numUsers = mysqli_num_rows(($resultat));
                    if ($numUsers > 0) {
                        $user = mysqli_fetch_array($resultat);

                        echo "Detailed user information. <br>"; 
                        echo "User ID: " . $user['user_id'] . "<br>";
                        echo "Name: " . $user['name'] . "<br>";
                        echo "Surname: " . $user['surname'] . "<br>";
                        echo "Email: " . $user['email'] . "<br>";
                        echo "Role: " . $user['rol'] . "<br>";
                        echo "Active: " . $user['active'] . "<br>";

                    } else {
                        include "loginForm.html";
                        echo "Error en el login";
                    }
                }
                else {
                    //Si es un error de la conexió, retorna una excepció
                    throw new Exception("Error en la consulta: " . mysqli_error($connect));
                }
            }catch (Exception $e) {
                //El captura l'excepció, amb el missatge personalitazat
                echo 'Se produjo una excepción: ' . $e->getMessage();
            }
        ?>
            <a href="index.php">Go back</a>
        <?php        
        } else{
            echo "Error, no s'ha entrat en el primer if";}
        
    }

    function masInfoPorDefecto(){
        if (isset($_GET["id"])) {
            //Es guarda el user_id en la variable, per utilitzar-la després. 
            $user_id = $_GET['id'];
            // consulta per mostrar l'informació completa de l'usuari, tenint en compte el userId.
            try{
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
                $query = "SELECT * FROM user WHERE user_id = '$user_id' ";
                $resultat = mysqli_query($connect, $query);
                if($resultat){
                    $numUsers = mysqli_num_rows(($resultat));
                    if ($numUsers > 0) {
                        $user = mysqli_fetch_array($resultat);

                        echo "Informació detallada de l'usuari. <br>"; 
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
                    //Si es un error de la conexió, retorna una excepció
                    throw new Exception("Error en la consulta: " . mysqli_error($connect));
                }
            }catch (Exception $e) {
                //El captura l'excepció, amb el missatge personalitazat
                echo 'Se produjo una excepción: ' . $e->getMessage();
            }
        ?>
            <a href="index.php">Tornar</a>
        <?php        
        } else{
            echo "Error, no s'ha entrat en el primer if";}

    }
        
    ?>
</body>
</html>