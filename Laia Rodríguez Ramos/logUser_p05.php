<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
        include "dbConf.php";

        $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

        /*
        define("DB_HOST", "localhost");
        define("DB_NAME", "users");
        define("DB_USER", "root");
        define("DB_PSW", "");
        */

        // VALORS PER EL FORMULARI LOGIN
        $password = $_POST["password"];
        $email = $_POST["email"];

        //AIXO HAURIA DE SER TOT UN. 
        $role1 = 'Professor'; 
        $role2 = 'Alumne';

        //try catch i finally
        try {
            if($connect){

                if(isset($_POST["email"]) && isset($_POST["password"])){
                    $query = "SELECT FROM userlaia ( password, email, role) VALUES ('$password', '$email', '$role1')";

                    echo "Bon dia " .$email; 
                    echo "Bon dia " .$password;
                    echo "Bon dia " .$role1;  

                    //AIXO ESTA PERFE I ARA NECESSITO QUE AQUI, TAMBÉ COMPROVI SI ES ALUMNE O PROFE. 

                } else echo "Els valors son incorrectes.";



            }
            else echo "Els valors IDK.";
        }
        catch (Exception $e) {
            echo "No m'he pogut conectar a la base de dades. "  .$e->getMessage();
        }
        finally{
            mysqli_close($connect);
        }
    ?>
</body>
</html>