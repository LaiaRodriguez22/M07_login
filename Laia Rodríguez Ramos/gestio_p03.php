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

        //CCONNEXIO
        $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
        //COMPROVA SI CONNEXIO ES CORRECTE 
        if(!$connect){
             echo "Error!!!! ".mysqli_connect_error();
        }else{
            //SELECT PER RETORNAR ELS PRODUCTES DE LA TAULA
            $query = "SELECT * FROM userlaia";
            $productes = mysqli_query($connect, $query);
        }

        if(!$productes){
            echo "Error en la consulta";
        }
        else{
            foreach($productes as $i => $userlaia){
                echo "ID PRODUCTE: " . $userlaia[user_id];
                echo "<br>";
                echo "NOM PRODUCTE: " . $userlai[username];
                echo "<br>";
                
                echo "<br>";

                echo "<br><br>";
            }
        }
    ?>
</body>
</html>