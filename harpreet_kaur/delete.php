<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Fitxer per eliminar la cookie, després de eliminar es redirreciona a l'index.php on es mostrarà 
            informació en l'idioma per defecte-->
    <?php
        include "idioma.php";
        if (isset($_COOKIE['cookieIdioma'])) {
            setcookie('cookieIdioma', "", time() -1);
        }else{
            "Error en eliminar el cookie";
        }           
        header('Location: index.php');
    ?>    
</body>
</html>
