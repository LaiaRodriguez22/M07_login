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
            echo "La taula ". $i ." té ". $taulesRestaurant[$i] . " comensals.<br>";
            if($taulesRestaurant[$i] == 0){
                echo "BUIDA.<br>";
            }
            elseif($taulesRestaurant[$i] == 5){
                echo "PLENA.<br>";
            }
            else{
                echo "té X comensals.<br>";
            }
        }





    ?>
</body>
</html>