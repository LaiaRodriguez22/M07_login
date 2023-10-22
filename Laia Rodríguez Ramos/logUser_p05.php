<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
        include "dbConf.php";

        // VALORS PER EL FORMULARI LOGIN
        $password = $_POST["password"];
        $email = $_POST["email"];

        $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

        //try catch i finally
        try {
            $query = "SELECT email, password, rol, username, surname FROM userlaia WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($connect, $query);
        
            //SI HI HA UN USUARI COM A MINIM REGISTRAT, ENTRA.
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                $rol = $row['rol'];
                $username = $row['username'];
                $surname = $row['surname'];
                
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
                //SI NO ES RES DE RES!!
                else{
                    include "logUser.html";
                    echo "No estas registrat? Regista't ara!";
                }
            } else {
                include "logUser.html";
                echo "Les dades d'inici de sessió són incorrectes.";
            }
        } 
        catch (Exception $e) {
            include "logUser.html";
            echo "No m'he pogut conectar a la base de dades. " . $e->getMessage();
        } 
        finally {
            mysqli_close($connect);
        }
    ?>
</body>
</html>