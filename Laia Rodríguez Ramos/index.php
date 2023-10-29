<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
         //SI ES ALUMNE
         if ($rol === 'Alumne') {

            echo "Benvingut com a alumne, " . $username . " <br>";
            echo "Nom: $username <br>";
            echo "Cognom: $surname <br>";
            echo "Correu: $email <br>";
        } 
        //SI ES PROFESSOR
        elseif ($rol === 'Professor') {
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
    ?>
</body>
</html>