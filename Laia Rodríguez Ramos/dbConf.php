<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //CONSTANTS DE LA CONNEXIÓ A LA BBDD
        define("DB_HOST", "localhost");
        define("DB_NAME", "users");
        define("DB_USER", "root");
        define("DB_PSW", "");
        //NO DEFFENEIXO EL PORT.

        $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
        
    ?>
</body>
</html>