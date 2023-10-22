<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--Captura de les dades a través de l'acció Post i formulari Login.html-->
    <?php
    $correo = $_POST['email'];
    $password = $_POST['contrasenya'];
    ?>

    <!--Totes les dades de la conexió estan declarats en el fitxer dbConfig -->
    <?php
    include "dbConfig.php";
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    //Trucada a la funció principal
    verifyUser($connect, $correo, $password);

    function verifyUser($connect, $correo, $password)
    {
        try {
            $query = "SELECT email, password, rol, name, surname FROM user WHERE email = '$correo' AND password = '$password'";
            $users = mysqli_query($connect, $query);
            if ($users) {
                $numUsers = mysqli_num_rows(($users));
                if ($numUsers > 0) {
                    $resultat = mysqli_fetch_array($users);
                    //Control del rol, depenent del rol, truca una funció o l'altre.
                    if ($resultat["rol"] == "alumnat") {
                        roleAlumnat($resultat);
                    } elseif ($resultat["rol" == "professorat"]) {
                        consultaProfessor($connect, $resultat);
                    } else {
                        echo "no eres ni alumno ni profe";
                    }
                } else {
                    include "loginForm.html";
                    echo "Error en el login";
                }
            } else {
                throw new Exception("Error en la consulta: " . mysqli_error($connect));
            }
        } catch (Exception $e) {
            echo 'Se produjo una excepción: ' . $e->getMessage();
        }
    } //function

    //Funció que mostra dades del alumne conectat. 
    function roleAlumnat($resultat)
    {
        echo "Soc un alumne" . "<br>";
        echo "nom: " . $resultat["name"] . "<br>";
        echo "cognom: " . $resultat["surname"] . "<br>";
        echo "email: " . $resultat["email"] . "<br>";
    }

    function consultaProfessor($connect, $resultat)
    {
        try {
            //es fa un altre consulta per obtenir tots els usuaris de la BD
            $query = "SELECT * FROM user";
            $resultCon = mysqli_query($connect, $query);

            if ($resultCon) {
                $resultatUsers = array();

                while ($user = mysqli_fetch_array($resultCon)) {
                    $resultatUsers[] = $user;
                }
                //truacada a la funció principal, per mostrar les dades de tots els usuaris. 
                roleProfessorat($resultat, $resultatUsers);
            } else {
                //aquesta excepció serà capturada a través del catch. Es genera una excepció si no pot
                //connectar correctament. 
                throw new Exception("Error en la consulta: " . mysqli_error($connect));
            }
        } catch (Exception $e) {
            echo 'Se produjo una excepción: ' . $e->getMessage();
        } finally {
            mysqli_close($connect);
        }
    }

    //Funció per mostrar dades si el rol es professorat. 
    function roleProfessorat($resultat, $allUsers)
    {
        echo "Hola " . $resultat["name"] . ", ets professor!!" . "<br>";
        echo "<br>";
        echo "La lista de usuarios de la base de datos es: " . "<br>";

        foreach ($allUsers as $user) {
            echo "Nom i cognom: " . $user["name"] . " " . $user["surname"] . "<br>";
        }
    }
    ?>

</body>

</html>