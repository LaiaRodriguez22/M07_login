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
    <title>Index</title>
</head>
<body>
    <?php
        if (!isset($_COOKIE[$cookieLang])) {
            //echo 'La cookie es la default. CAT.';
            //setcookie($cookieLang, $cookieCat, $tempsDuracio);
            //AQUI AL FER EL SETCOOKIE, ES FEIA EL BUCLE AMB DELETE I PER AIXO
            //LA COOKIE NO S'ESBORRABA MAI.
            cookieValueDefault();
        } else if(isset($_COOKIE[$cookieLang])){
            if($_COOKIE[$cookieLang] == "es"){
                cookieValueEs();
            }
            else if($_COOKIE[$cookieLang] == "cat"){
                cookieValueCat();
            }
            else if($_COOKIE[$cookieLang] == "en"){
                cookieValueEn();
            }
        }

        function cookieValueDefault(){
            if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] === true) {
                //SI ES ALUMNE
                if ($_SESSION['rol'] === 'Alumne') {

                    echo "<h1>Benvingut, " . $_SESSION["username"] . "! Ets un: " . $_SESSION["rol"] . "</h1>";?>
  
                    <a href="idioma.php?idioma=cat">CAT</a>
                    <a href="idioma.php?idioma=es">ES</a>
                    <a href="idioma.php?idioma=en">EN</a>

                    <a href="delete.php">Eliminar</a>
                    <br><br>
                    <a href="mostrarInfo.php?id=<?php echo $_SESSION["user_id"]; ?> ">Mostrar informacio</a>
                    <a href="desconnectar.php">Desconnectar</a>
                    
                    <?php

                } 
                //SI ES PROFESSOR
                elseif ($_SESSION['rol'] === 'Professor') {

                    echo "<h1>Benvingut, " . $_SESSION["username"] . "! Ets un: " . $_SESSION["rol"] . "</h1>";

                    $query = "SELECT username, surname, email FROM userlaia";

                    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
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

                    <a href="idioma.php?idioma=cat">CAT</a>
                    <a href="idioma.php?idioma=es">ES</a>
                    <a href="idioma.php?idioma=en">EN</a>
                    
                    <a href="delete.php">Eliminar</a>
                    <br><br>
                    <a href="mostrarInfo.php?id=<?php echo $_SESSION["user_id"]; ?> ">Mostrar informacio</a>
                    <a href="desconnectar.php">Desconnectar</a>
                    
                    <?php
                }
            }
            else{
                header('Location: logUser.html');
            }
        }

        //AIXO HAURIA DE SER UNA FUNCIO PER CATALÀ
        function cookieValueCat(){
            if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] === true) {
                //SI ES ALUMNE
                if ($_SESSION['rol'] === 'Alumne') {

                    echo "<h1>Benvingut, " . $_SESSION["username"] . "! Ets un: " . $_SESSION["rol"] . "</h1>";?>
  
                    <a href="idioma.php?idioma=cat" style="<?php echo ($_COOKIE['lang'] === 'cat') ? ' color: red;' : ' color: blue;'; ?>">CAT</a>
                    <a href="idioma.php?idioma=es" style="<?php echo ($_COOKIE['lang'] === 'es') ? ' color: red;' : ' color: blue;'; ?>">ES</a>
                    <a href="idioma.php?idioma=en" style="<?php echo ($_COOKIE['lang'] === 'en') ? ' color: red;' : ' color: blue;'; ?>">EN</a>

                    <a href="delete.php">Eliminar</a>
                    <br><br>
                    <a href="mostrarInfo.php?id=<?php echo $_SESSION["user_id"]; ?> ">Mostrar informacio</a>
                    <a href="desconnectar.php">Desconnectar</a>
                    
                    <?php

                } 
                //SI ES PROFESSOR
                elseif ($_SESSION['rol'] === 'Professor') {

                    echo "<h1>Benvingut, " . $_SESSION["username"] . "! Ets un: " . $_SESSION["rol"] . "</h1>";

                    $query = "SELECT username, surname, email FROM userlaia";

                    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
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

                    <a href="idioma.php?idioma=cat" style="<?php echo ($_COOKIE['lang'] === 'cat') ? ' color: red;' : ' color: blue;'; ?>">CAT</a>
                    <a href="idioma.php?idioma=es" style="<?php echo ($_COOKIE['lang'] === 'es') ? ' color: red;' : ' color: blue;'; ?>">ES</a>
                    <a href="idioma.php?idioma=en" style="<?php echo ($_COOKIE['lang'] === 'en') ? ' color: red;' : ' color: blue;'; ?>">EN</a>
                    
                    <a href="delete.php">Eliminar</a>
                    <br><br>
                    <a href="mostrarInfo.php?id=<?php echo $_SESSION["user_id"]; ?> ">Mostrar informacio</a>
                    <a href="desconnectar.php">Desconnectar</a>
                    
                    <?php
                }
            }
            else{
                header('Location: logUser.html');
            }
        }

        //AIXO HAURIA DE SER UNA FUNCIO PER CASTELLA
        function cookieValueEs(){
            if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] === true) {
                //SI ES ALUMNE
                if ($_SESSION['rol'] === 'Alumne') {

                    echo "<h1>Bienvenido, " . $_SESSION["username"] . "! Eres un: " . $_SESSION["rol"] . "</h1>";?>
                    
                    <a href="idioma.php?idioma=cat" style="<?php echo ($_COOKIE['lang'] === 'cat') ? ' color: red;' : ' color: blue;'; ?>">CAT</a>
                    <a href="idioma.php?idioma=es" style="<?php echo ($_COOKIE['lang'] === 'es') ? ' color: red;' : ' color: blue;'; ?>">ES</a>
                    <a href="idioma.php?idioma=en" style="<?php echo ($_COOKIE['lang'] === 'en') ? ' color: red;' : ' color: blue;'; ?>">EN</a>
                    
                    <a href="delete.php">Eliminar</a>
                    <br><br>
                    <a href="mostrarInfo.php?id=<?php echo $_SESSION["user_id"]; ?> ">Mostrar información</a>
                    <a href="desconnectar.php">Desconectar</a>
                    
                    <?php

                } 
                //SI ES PROFESSOR
                elseif ($_SESSION['rol'] === 'Professor') {

                    echo "<h1>Benvingut, " . $_SESSION["username"] . "! Ets un: " . $_SESSION["rol"] . "</h1>";

                    $query = "SELECT username, surname, email FROM userlaia";

                    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
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

                    <a href="idioma.php?idioma=cat" style="<?php echo ($_COOKIE['lang'] === 'cat') ? ' color: red;' : ' color: blue;'; ?>">CAT</a>
                    <a href="idioma.php?idioma=es" style="<?php echo ($_COOKIE['lang'] === 'es') ? ' color: red;' : ' color: blue;'; ?>">ES</a>
                    <a href="idioma.php?idioma=en" style="<?php echo ($_COOKIE['lang'] === 'en') ? ' color: red;' : ' color: blue;'; ?>">EN</a>
                    
                    <a href="delete.php">Eliminar</a>
                    <br><br>
                    <a href="mostrarInfo.php?id=<?php echo $_SESSION["user_id"]; ?> ">Mostrar información</a>
                    <a href="desconnectar.php">Desconectar</a>
                    
                    <?php
                }
            }
            else{
                header('Location: logUser.html');
            }  
        }
        //AIXO HAURIA DE SER UNA FUNCIO PER ENGLISH
        function cookieValueEn(){
            if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] === true) {
                //SI ES ALUMNE
                if ($_SESSION['rol'] === 'Alumne') {

                    echo "<h1>Welcome, " . $_SESSION["username"] . "! You are: " . $_SESSION["rol"] . "</h1>";?>
                    
                    <a href="idioma.php?idioma=cat" style="<?php echo ($_COOKIE['lang'] === 'cat') ? ' color: red;' : ' color: blue;'; ?>">CAT</a>
                    <a href="idioma.php?idioma=es" style="<?php echo ($_COOKIE['lang'] === 'es') ? ' color: red;' : ' color: blue;'; ?>">ES</a>
                    <a href="idioma.php?idioma=en" style="<?php echo ($_COOKIE['lang'] === 'en') ? ' color: red;' : ' color: blue;'; ?>">EN</a>
                    
                    <a href="delete.php">Delete</a>
                    <br><br>
                    <a href="mostrarInfo.php?id=<?php echo $_SESSION["user_id"]; ?> ">Show Data</a>
                    <a href="desconnectar.php">Sign Out</a>
                    
                    <?php

                } 
                //SI ES PROFESSOR
                elseif ($_SESSION['rol'] === 'Professor') {

                    echo "<h1>Benvingut, " . $_SESSION["username"] . "! Ets un: " . $_SESSION["rol"] . "</h1>";

                    $query = "SELECT username, surname, email FROM userlaia";

                    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
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

                    <a href="idioma.php?idioma=cat" style="<?php echo ($_COOKIE['lang'] === 'cat') ? ' color: red;' : ' color: blue;'; ?>">CAT</a>
                    <a href="idioma.php?idioma=es" style="<?php echo ($_COOKIE['lang'] === 'es') ? ' color: red;' : ' color: blue;'; ?>">ES</a>
                    <a href="idioma.php?idioma=en" style="<?php echo ($_COOKIE['lang'] === 'en') ? ' color: red;' : ' color: blue;'; ?>">EN</a>
                    
                    <a href="delete.php">Delete</a>
                    <br><br>
                    <a href="mostrarInfo.php?id=<?php echo $_SESSION["user_id"]; ?> ">Show data</a>
                    <a href="desconnectar.php">Sign Out</a>
                    
                    <?php
                }
            }
            else{
                header('Location: logUser.html');
            }
        }
    ?>
</body>
</html>

