<?php  


    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

    
            if (isset($_GET['x'])) {
                $c = $_GET['x'];

                $sql = "SELECT i.Nombre,i.Descripcion,i.Precio,od.Cantidad FROM orden as o 
                inner join orden_detalle as od
                on o.Id=od.Id_orden
                
                 inner join insumo as i
                 on od.Id_insumo=i.Id
                 where o.Id=$c;";
            }
          
            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }
