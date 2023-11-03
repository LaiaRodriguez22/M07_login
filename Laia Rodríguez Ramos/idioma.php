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

        if (isset($_GET['idioma'])) {
            $idioma = $_GET['idioma'];
        
            if ($idioma == $cookieCat) {
                setcookie($cookieLang, $cookieCat); 
            } 
            elseif ($idioma == $cookieEs) {
                setcookie($cookieLang, $cookieEs); 
            } 
            elseif ($idioma == $cookieEn) {
                setcookie($cookieLang, $cookieEn); 
            }
            // TORNA AL INDEX.PHP
            header('Location: index.php');
        }
    ?>
</body>
</html>