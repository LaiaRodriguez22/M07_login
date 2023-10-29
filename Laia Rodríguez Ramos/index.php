<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        session_start();

        echo " El teu nom és " . $_SESSION["username"];

        if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] === true) {
            //SI ES ALUMNE
            if ($_SESSION['rol'] === 'Alumne') {

                echo "Benvingut com a alumne, " . $_SESSION["username"] . " <br>";
                echo "Nom:" . $_SESSION["username"] . "<br>";
                //AIXO PETA PERQUE JO NO TINC SESSIO DE SURNAME I EMAIL. HAIG DE FER EL GET.
                $cognom = $_GET["surname"];
                echo "Cognom: " .  $cognom . "<br>";
                //echo "Correu: " . $_SESSION["email"] . "<br>";
            } 
            //SI ES PROFESSOR, SENSE FER. 
            elseif ($_SESSION['rol'] === 'Professor') {
                echo "Benvingut com a professor, " . $username;
                $query = "SELECT username, surname FROM userlaia";
                $result = mysqli_query($connect, $query);

                header('Location: index.php');

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
                        echo "Nom i cognom: $username $surname <br>";
                    }
                }
            }

            //NECESSARI PER BORRAR LES VARIABLES DE SESSIO I LA SESSIO EN SI. 
            session_unset();
            session_destroy();
        }
    ?>
</body>
</html>