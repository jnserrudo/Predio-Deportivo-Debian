<?php  

    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

            if (isset($_GET['i'])) {
                $i = $_GET['i'];
                $sql = "SELECT Monto,Fecha,Letra,Nro_Factura,Fecha_Factura FROM comprobante WHERE Id='$i'";

            }
                     
            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }