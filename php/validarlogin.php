
<?php

    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

            if (isset($_GET['x']) && isset($_GET['y'])) {
                $x = $_GET['x'];
                $y = $_GET['y'];

                // echo $c;
                // if(!$c=""){
                $sql = "SELECT Id FROM usuario
                    where Usuario=$x and Contraseña=$y
                 ";
                $resultado=mysqli_query($conexion,$sql);

                 if ($resultado) {
                    $resultados=mysqli_fetch_all($resultado, PDO::FETCH_ASSOC);
    
                    echo json_encode($resultados);
                 }else{
                //   $sql = "SELECT * FROM insumo";
                echo 1;
                }
            


            
            // }else{
            //     echo "a";
            }
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }
