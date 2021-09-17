<?php  
$conexion = NULL;
        


          try{
            $conexion = mysqli_connect('localhost','root','','debian2');
            
            if (isset($_POST['t'])) {
                $z = $_POST['t'];
                $GLOBALS['z']=$z;

               $sql = "SELECT remito.id,remito.id_orden,remito.fecha,remito_detalle.id_insumo,remito_detalle.cantidad FROM remito INNER JOIN remito_detalle on remito_detalle.Id_rem=remito.Id WHERE remito.Id=$z;";

                $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_array($resultado);
            var_dump($resultados);
            $GLOBALS['res']=$resultados;
            }
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }

