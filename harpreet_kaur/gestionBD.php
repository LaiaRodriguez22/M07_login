<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //constants de la conexió de BD
    define("DB_HOST", "localhost");
    define("DB_NAME", "users");
    define("DB_USER", "root");
    define("DB_PSW", "");
    //define ("DB_PORT", 3306);

    //Connectar a la base de dades
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);

    if(!$connect){
        echo "Error de conexió ". mysqli_connect_error();
    }else{
        //consultes
    }
    

    ?>
    <?php
        $id = $_POST['id'];
        $nombre = $_POST['nom'];
        $apellido = $_POST['cognom'];
        $password = $_POST['password'];
        $correo = $_POST['email'];

        echo $id . $nombre . $apellido . $password . $correo;   
           
    ?>
</body>
</html>