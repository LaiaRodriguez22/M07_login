<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <?php
        include "idioma.php";
        //Valor buit 
        if (isset($_COOKIE[$cookieLang])) {
            setcookie($cookieLang, "", time() - 3600); 
        } 
        
        header('Location: index.php');
    ?>
</body>
</html>