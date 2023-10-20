<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laia Rodriguez Ramos</title>
</head>
<body>
    <?php
        // VALORS PER EL FORMULARI
        // AQUEST POST A L'ID NO TÉ SENTIT AL SER AUTOINCREMENTAL.
        $id = $_POST["id"];
        $nomUser = $_POST["nom"];
        $cognomUser = $_POST["cognom"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $rol = $_POST["rol"];

        // 0 -> CHECKBOX PREDETERMINAT.
        $active = 0; // Establecer un valor predeterminado de 0

        // Comprobar si el checkbox "actiu" está marcado en el formulario
        if (isset($_POST["actiu"])) {
            $active = 1; // Checkbox marcado, establecer el valor en 1
        }

        // CONSTANTS DE LA CONNEXIÓ A LA BBDD
        define("DB_HOST", "localhost");
        define("DB_NAME", "users");
        define("DB_USER", "root");
        define("DB_PSW", "");
        // NO DEFFENEIXO EL PORT.

        $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);

        $query = "INSERT INTO userlaia (user_id, username, surname, password, email, rol, active) VALUES ('$id', '$nomUser', '$cognomUser', '$password', '$email', '$rol', '$active')";

        //COMPROVA SI CONNEXIO ES CORRECTE 
        if(!$connect){
            echo "Error!!!! ".mysqli_connect_error();
        }else{
                //NOTA: HO HE FET AIXI PERQUE EM FEIA EL POST DUES VEGADES AMB LO DE PRODUCTES I LLAVORS LA COMPROVACIÓ.
                //      ES A DIR, ARA EL POST, ES FA EN EL PROPI IF (MYSQLI_QUERY...)
                //  INSERCIÓ DE QUERY A BBDD
            if (mysqli_query($connect, $query)) {
                // REDIRECCIONA A INFO_P03 PER CONFIRMACIÓ
                header('Location: info_p03.php');
            } else {
                echo "Error al afegir dades a la BBDD: " . mysqli_error($connect);
            }
        }
        // TANCA CONNEXIO
        mysqli_close($connect);
    ?>
</body>
</html>