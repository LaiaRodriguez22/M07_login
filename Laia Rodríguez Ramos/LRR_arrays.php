<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<h1>Taules del restaurant</h1>";

        $taulesRestaurant = array();
        
        for ($i = 0; $i < 10; $i++) {
            $taulesRestaurant[$i] = rand(0, 5);
            echo $taulesRestaurant[$i] . "<br>";
        }




    ?>
</body>
</html>