<?php
//start the session
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

    //Aquest if comprova si la variable cookieIdioma té un valor assignat o no.
        if(isset($_COOKIE['cookieIdioma'])){
            //Si té un valor assigant, comprova quien és i fa la trucada a la funció corresponent.
            if($_COOKIE['cookieIdioma'] == "cat"){
                infoCat();
            }
            else if($_COOKIE['cookieIdioma'] == "es"){
                infoEs();
            }
            else if($_COOKIE['cookieIdioma'] == "en"){
                infoEn();
            }
        }else{
            // en el cas de que no tingui un, executa la funció per defecte.
            infoPorDefecto();            
        }

    /**
     * 4 funcions, totes tenen el mateixa estructura i codi, només es tradueix en el llenguatge corresponent. 
     * infoCat: traducció català
     * inforEs: traducció castellà
     * infoEn: traducció anglés
     * infoPorDefecto: No he pogut utilitzar infoCatal, perqué en aquest cas no hi ha d'haver un cookie. 
     */

    function infoCat(){
        if (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] === true) {
            //---------------------Rol Alumne----------------------------
            if ($_SESSION['role'] === 'alumnat') {
                echo "<h2>Hola " . $_SESSION["name"] . ", ets un alumne </h2>";    
        ?>
                <a href="idioma.php?idioma=cat" style="color:red">CAT</a>
                <a href="idioma.php?idioma=es" style="color:blue">ES</a>
                <a href="idioma.php?idioma=en" style="color:blue">EN</a>
                <a href="delete.php">Eliminar</a>
                <br><br> 
                <a href="masInformacion.php?id=<?php echo $_SESSION['user_id']; ?>">Mostrar informació</a>
                <a href="desconectar.php">Desconnectar</a>
                <br><br>                              
    
            <?php
            }
            //------------------------Rol Professor-------------------- 
            elseif ($_SESSION['role'] === 'professorat') {
                echo "<h2>Hola " . $_SESSION["name"] . ", ets un professor </h2>"; ?>

                <a href="idioma.php?idioma=cat" style="color:red">CAT</a>
                <a href="idioma.php?idioma=es" style="color:blue">ES</a>
                <a href="idioma.php?idioma=en" style="color:blue">EN</a>
                <a href="delete.php">Eliminar</a>
                <br><br>
                <a href="masInformacion.php?id=<?php echo $_SESSION['user_id']; ?>">Mostrar informació</a>
                <a href="desconectar.php">Desconnectar</a>
                <br><br>

                <?php
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
                try {
                    //fa una consulta per obtenir tots els usuaris de la BD
                    $query = "SELECT name, surname, email FROM user";
                    $resultCon = mysqli_query($connect, $query);
                    if ($resultCon) {
                        $resultatUsers = array();

                        while ($user = mysqli_fetch_array($resultCon)) {
                            $resultatUsers[] = $user;
                        }
                        //Imprimeix en format taula tots els usuaris
                        echo "<table>";
                        echo "<tr>";
                        echo "  <th> Nom </th>";
                        echo "  <th> Cognom </th>";
                        echo "  <th> Email </th>";
                        echo "<tr>";
                        foreach ($resultatUsers as $user) {
                            echo "<tr>";
                            echo "<td> " . $user["name"] .  "</td>";
                            echo "<td> " . $user["surname"] .  "</td>";
                            echo "<td> " . $user["email"] .  "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        //aquesta excepció serà capturada a través del catch. Es genera una excepció si no pot
                        //connectar correctament. 
                        throw new Exception("Error en la consulta: " . mysqli_error($connect));
                    }
                } catch (Exception $e) {
                    echo 'Se produjo una excepción: ' . $e->getMessage();
                }//try de la consulta de profesor.
            } //elseIf Professorat
            else {
                echo "Vayaaaa, error";
            }
        } else {
            include "loginForm.html";
            echo "No entra en el bucle del if isLogged";
    
        } // if isLogged
    }

    //----------------------------------------------Castellà-----------------------------------

    function infoEs(){
        if (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] === true) {
            //---------------------Rol Alumne----------------------------
            if ($_SESSION['role'] === 'alumnat') {
                echo "<h2>Hola " . $_SESSION["name"] . ", eres un alumne </h2>";    
        ?>
                <a href="idioma.php?idioma=cat" style="color:blue">CAT</a>
                <a href="idioma.php?idioma=es" style="color:red">ES</a>
                <a href="idioma.php?idioma=en" style="color:blue">EN</a>
                <a href="delete.php">Eliminar</a>
                <br><br>
                <a href="masInformacion.php?id=<?php echo $_SESSION['user_id']; ?>">Mostrar información</a>
                <a href="desconectar.php">Desconectar</a>
                <br><br>
    
            <?php
            } 
            //------------------------Rol Professor-------------------- 
            elseif ($_SESSION['role'] === 'professorat') {
                echo "<h2>Hola " . $_SESSION["name"] . ", eres un professor </h2>"; ?>
                <a href="idioma.php?idioma=cat" style="color:blue">CAT</a>
                <a href="idioma.php?idioma=es" style="color:red">ES</a>
                <a href="idioma.php?idioma=en" style="color:blue">EN</a>
                <a href="delete.php">Eliminar</a>
                <br><br>
                <a href="masInformacion.php?id=<?php echo $_SESSION['user_id']; ?>">Mostrar información</a>
                <a href="desconectar.php">Desconectar</a>
                <br><br>

                <?php
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
                try {
                    //fa una consulta per obtenir tots els usuaris de la BD
                    $query = "SELECT name, surname, email FROM user";
                    $resultCon = mysqli_query($connect, $query);
                    if ($resultCon) {
                        $resultatUsers = array();

                        while ($user = mysqli_fetch_array($resultCon)) {
                            $resultatUsers[] = $user;
                        }
                        //Imprimeix en format taula tots els usuaris
                        echo "<table>";
                        echo "<tr>";
                        echo "  <th> Nombre </th>";
                        echo "  <th> Apellido </th>";
                        echo "  <th> Email </th>";
                        echo "<tr>";
                        foreach ($resultatUsers as $user) {
                            echo "<tr>";
                            echo "<td> " . $user["name"] .  "</td>";
                            echo "<td> " . $user["surname"] .  "</td>";
                            echo "<td> " . $user["email"] .  "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        //aquesta excepció serà capturada a través del catch. Es genera una excepció si no pot
                        //connectar correctament. 
                        throw new Exception("Error en la consulta: " . mysqli_error($connect));
                    }
                } catch (Exception $e) {
                    echo 'Se produjo una excepción: ' . $e->getMessage();
                }//try de la consulta de profesor.
            } //elseIf Professorat
            else {
                echo "Vayaaaa, error";
            }
        } else {
            include "loginForm.html";
            echo "No entra en el bucle del if isLogged";
    
        } // if isLogged
    }  

    //----------------------------------------------Anglés-----------------------------------
  
    function infoEn(){
        if (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] === true) {
            //---------------------Rol Alumne----------------------------
            if ($_SESSION['role'] === 'alumnat') {
                echo "<h2>Hola " . $_SESSION["name"] . ", you are a student </h2>";    
        ?>
                <a href="idioma.php?idioma=cat" style="color:blue">CAT</a>
                <a href="idioma.php?idioma=es" style="color:blue">ES</a>
                <a href="idioma.php?idioma=en" style="color:red">EN</a>
                <a href="delete.php">Delete</a>
                <br><br>
                <a href="masInformacion.php?id=<?php echo $_SESSION['user_id']; ?>">Show information</a>
                <a href="desconectar.php">Disconnect</a>
                <br><br>
    
            <?php
            } 
            //------------------------Rol Professor-------------------- 
            elseif ($_SESSION['role'] === 'professorat') {
                echo "<h2>Hola " . $_SESSION["name"] . ", you are a teacher </h2>"; ?>

                <a href="idioma.php?idioma=cat" style="color:blue">CAT</a>
                <a href="idioma.php?idioma=es" style="color:blue">ES</a>
                <a href="idioma.php?idioma=en" style="color:red">EN</a>
                <a href="delete.php">Delete</a>
                <br><br>
                <a href="masInformacion.php?id=<?php echo $_SESSION['user_id']; ?>">Show Information</a>
                <a href="desconectar.php">Disconnect</a>
                <br><br>

                <?php
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
                try {
                    //fa una consulta per obtenir tots els usuaris de la BD
                    $query = "SELECT name, surname, email FROM user";
                    $resultCon = mysqli_query($connect, $query);
                    if ($resultCon) {
                        $resultatUsers = array();

                        while ($user = mysqli_fetch_array($resultCon)) {
                            $resultatUsers[] = $user;
                        }
                         //Imprimeix en format taula tots els usuaris
                        echo "<table>";
                        echo "<tr>";
                        echo "  <th> Name </th>";
                        echo "  <th> Surname </th>";
                        echo "  <th> Email </th>";
                        echo "<tr>";
                        foreach ($resultatUsers as $user) {
                            echo "<tr>";
                            echo "<td> " . $user["name"] .  "</td>";
                            echo "<td> " . $user["surname"] .  "</td>";
                            echo "<td> " . $user["email"] .  "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        //aquesta excepció serà capturada a través del catch. Es genera una excepció si no pot
                        //connectar correctament. 
                        throw new Exception("Error en la consulta: " . mysqli_error($connect));
                    }
                } catch (Exception $e) {
                    echo 'Se produjo una excepción: ' . $e->getMessage();
                }//try de la consulta de profesor.
            } //elseIf Professorat
            else {
                echo "Vayaaaa, error";
            }
        } else {
            include "loginForm.html";
            echo "No entra en el bucle del if isLogged";
    
        } // if isLogged
    }

     //----------------------------------------------Per Defecte Català-----------------------------------

    function infoPorDefecto(){
        if (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] === true) {
            //---------------------Rol Alumne----------------------------
            if ($_SESSION['role'] === 'alumnat') {
                echo "<h2>Hola " . $_SESSION["name"] . ", ets un alumne </h2>";    
        ?>
                <a href="idioma.php?idioma=cat" style="color:red">CAT</a>
                <a href="idioma.php?idioma=es" style="color:blue">ES</a>
                <a href="idioma.php?idioma=en" style="color:blue">EN</a>
                <a href="delete.php">Eliminar</a>
                <br><br>
                <a href="masInformacion.php?id=<?php echo $_SESSION['user_id']; ?>">Mostrar informació</a>
                <a href="desconectar.php">Desconnectar</a>
                <br><br>
    
            <?php
            }
            //------------------------Rol Professor--------------------
            elseif ($_SESSION['role'] === 'professorat') {
                echo "<h2>Hola " . $_SESSION["name"] . ", ets un professor </h2>"; ?>
                <a href="idioma.php?idioma=cat" style="color:red">CAT</a>
                <a href="idioma.php?idioma=es" style="color:blue">ES</a>
                <a href="idioma.php?idioma=en" style="color:blue">EN</a>
                <a href="delete.php">Eliminar</a>
                <br><br>
                <a href="masInformacion.php?id=<?php echo $_SESSION['user_id']; ?>">Mostrar informació</a>
                <a href="desconectar.php">Desconnectar</a>
                <br><br>
                
                <?php
                $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
                try {
                    //fa una consulta per obtenir tots els usuaris de la BD
                    $query = "SELECT name, surname, email FROM user";
                    $resultCon = mysqli_query($connect, $query);
                    if ($resultCon) {
                        $resultatUsers = array();

                        while ($user = mysqli_fetch_array($resultCon)) {
                            $resultatUsers[] = $user;
                        }
                         //Imprimeix en format taula tots els usuaris
                        echo "<table>";
                        echo "<tr>";
                        echo "  <th> Nom </th>";
                        echo "  <th> Cognom </th>";
                        echo "  <th> Email </th>";
                        echo "<tr>";
                        foreach ($resultatUsers as $user) {
                            echo "<tr>";
                            echo "<td> " . $user["name"] .  "</td>";
                            echo "<td> " . $user["surname"] .  "</td>";
                            echo "<td> " . $user["email"] .  "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        //aquesta excepció serà capturada a través del catch. Es genera una excepció si no pot
                        //connectar correctament. 
                        throw new Exception("Error en la consulta: " . mysqli_error($connect));
                    }
                } catch (Exception $e) {
                    echo 'Se produjo una excepción: ' . $e->getMessage();
                }//try de la consulta de profesor.

            } //elseIf Professorat
            else {
                echo "Vayaaaa, error";
            }
        } else {
            include "loginForm.html";
            echo "No entra en el bucle del if isLogged";
    
        } // if isLogged

    }
    ?>
</body>
</html>