<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] === true) {

        if ($_SESSION['role'] === 'alumnat') {
            echo "<h2>Hola " . $_SESSION["name"] . ", ets un alumne </h2>"; 
    ?>
            <a href="masInformacion.php?id=<?php echo $_SESSION['user_id']; ?>">Mostrar informació</a>
            <a href="desconnectar.php">Desconnectar</a>

        <?php
        } //if role Alumnat   
        elseif ($_SESSION['role'] === 'professorat') {
            echo "<h2>Hola " . $_SESSION["name"] . ", ets un professor </h2>";
            consultaProfessor();
        ?>
            <a href="masInformacion.php?id=<?php echo $_SESSION['user_id']; ?>">Mostrar informació</a>
            <a href="desconnectar.php">Desconnectar</a>

        <?php
        } //elseIf Professorat
        else {
            echo "Vayaaaa, error";
        }
    } else {
        session_unset();
        echo "Erorrrr";

    } // if isLogged

    function consultaProfessor(){
        include "dbConfig.php";
        $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
        try {
            //fa una consulta per obtenir tots els usuaris de la BD
            $query = "SELECT username, surname, email FROM user";
            $resultCon = mysqli_query($connect, $query);

            if ($resultCon) {
                $resultatUsers = array();

                while ($user = mysqli_fetch_array($resultCon)) {
                    $resultatUsers[] = $user;
                }
                //truacada a la funció principal, per mostrar les dades de tots els usuaris. 
                mostarAllUsers($resultatUsers);
            } else {
                //aquesta excepció serà capturada a través del catch. Es genera una excepció si no pot
                //connectar correctament. 
                throw new Exception("Error en la consulta: " . mysqli_error($connect));
            }
        } catch (Exception $e) {
            echo 'Se produjo una excepción: ' . $e->getMessage();
        }
    }//functionConsulta Professor

    function mostarAllUsers($allUsers){
        echo "<table>";
        echo "<tr>";
        echo "  <th> Nom </th>";
        echo "  <th> Cognom </th>";
        echo "  <th> Email </th>";
        echo "<tr>";
        foreach ($allUsers as $user) {
            echo "<tr>";
            echo "<td> " . $user["name"] .  "</td>";
            echo "<td> " . $user["surname"] .  "</td>";
            echo "<td> " . $user["email"] .  "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }//reoleProffesorat
    ?>
</body>
</html>