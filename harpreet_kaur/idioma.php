<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Fitxer per guardar el valor de la cookie -->
    <?php
        if (isset($_GET['idioma'])) {
            $idioma = $_GET['idioma'];
            // es guarda el valor de la cookie en la variable cookieIdioma, 
            //en tots els altres fitxers s'ha d'utilitzar la variable "cookieIdioma".
            if ($idioma == "cat") {
                setcookie('cookieIdioma', $idioma); 
            } 
            elseif ($idioma == "es") {
                setcookie('cookieIdioma', $idioma); 
            } 
            elseif ($idioma == "en") {
                setcookie('cookieIdioma', $idioma); 
            }
            header('Location: index.php');
        }
    ?>
</body>
</html>