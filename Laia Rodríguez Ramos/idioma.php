<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idioma</title>
</head>
<body>
    <?php
        //NOM
        $cookieLang = "lang";
        //COOKIE IDIOMES
        $cookieCat = "cat";
        $cookieEs = "es";
        $cookieEn = "en";

        //DEU MINUTS PERQUE CADUQUI LA COOKIE
        $tempsDuracio = time() + 600;

        if (isset($_GET['idioma'])) {
            $idioma = $_GET['idioma'];

            if ($idioma == $cookieCat) {
                setcookie($cookieLang, $cookieCat, $tempsDuracio); 
            } 
            elseif ($idioma == $cookieEs) {
                setcookie($cookieLang, $cookieEs, $tempsDuracio); 
            } 
            elseif ($idioma == $cookieEn) {
                setcookie($cookieLang, $cookieEn, $tempsDuracio); 
            }
            // TORNA AL INDEX.PHP
            header('Location: index.php');
        }
    ?>
</body>
</html>