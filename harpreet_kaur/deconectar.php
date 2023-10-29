<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // per treure totes les variables de sessió
    session_unset();

    // per destruir la sessió
    session_destroy();

    //redirrecionament
    header('Location: loginFrom.html');

    ?>
</body>
</html>