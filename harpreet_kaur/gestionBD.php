<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- les dades que captura del fitxer "formulario.html els guarda en aquested variables"-->
    <?php
    $id = $_POST['id'];
    $nombre = $_POST['nom'];
    $apellido = $_POST['cognom'];
    $password = $_POST['password'];
    $correo = $_POST['email'];
    $active = true;

    echo $id . " " .  $nombre . " " . $apellido . " " . $password . " " . $correo;
    ?>

    <?php
    //constants de la conexió de BD
    define("DB_HOST", "localhost");
    define("DB_NAME", "users");
    define("DB_USER", "root");
    define("DB_PSW", "");
    define("DB_PORT", 3306);
    $conexionBD = null;  //es important inicialitzar la varibale, en cas contrari donà error. 


    //Connectar a la base de dades, ha d'estar en aquest ordere.
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    //Si no aconseguiex conectar a la BD salta un error.
    if (!$connect) {
        echo "ERROR!!!!" . mysqli_connect_error();
    } else {
        //consultes
        $query = "INSERT INTO user(user_id, name, surname, password, email, rol, active) 
        VALUES ('$id', '$nombre', '$apellido', '$password', '$correo', alumnat , '$active')";
        $conexionBD = mysqli_query($connect, $query);
    }


    //Si ha pogut insertar les dades correctament el "Header" redireccionará al fitxer "resultado.php" 
    if ($conexionBD) {
        header('Location: resultado.php');
    } else {
        echo "Error: " . mysqli_error($connect);
    }
    ?>

</body>

</html>