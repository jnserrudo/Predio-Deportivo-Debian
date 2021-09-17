<?php  


    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');




        
            if (isset($_GET['x'])) {
                $c = $_GET['x'];

                $sql = "SELECT * FROM socio where Id like '%$c%' or Nombre like '%$c%' or Apellido like '%$c%' or DNI like '%$c%' or Estado like '%$c%' or Email like '%$c%' or Direccion like '%$c%' or Telefono like '%$c%'";

            }
            else{
                $sql = "SELECT * FROM socio";   
            }
          


            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }

