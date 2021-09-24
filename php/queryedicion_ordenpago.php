<?php  
$conexion = NULL;
        

         
          try{
            $conexion = mysqli_connect('localhost','root','','debian2');
            
            if (isset($_POST['t'])) {
                $z = $_POST['t'];
                $GLOBALS['z']=$z;

                $sql = "SELECT * FROM ordenpago where Id=$z";

                $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_array($resultado);
            var_dump($resultados);
            $GLOBALS['res']=$resultados;
            }
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }

