<?php  
    $conexion = NULL;
        try
        {
            $tipo = $_GET['tipo'];

            $conexion1 = mysqli_connect('localhost','root','','debian2');

            if($tipo == 0){ //borrar la tabla
                $sql = "DROP TABLE `temporal`";
            }
            else if ($tipo == 1){ //crear la tabla
                $sql = "CREATE TABLE `debian2`.`temporal` ( `Id` INT PRIMARY KEY AUTO_INCREMENT , `Id_producto` INT NOT NULL , `Cantidad` INT NOT NULL );";
            }
            else if($tipo == 2){ //insertar datos a la tabla

                $idproducto = $_GET["id"];
                $cantproducto = $_GET["cant"];
                $sql = "INSERT INTO `temporal` (`Id`, `Id_producto`, `Cantidad`) VALUES (NULL, $idproducto, $cantproducto)";
            }
            else if($tipo==3){ //quita los datos de la tabla
                $idproducto = $_GET["id"];
                $cantproducto = $_GET["cant"];
                $sql = "DELETE FROM `temporal` WHERE Id_producto= $idproducto and Cantidad = $cantproducto ";
            }
            else if($tipo==4){ //Inserta el remito
                $codremito = $_GET["cod"];
                $ordencompra = $_GET["orden"];
                $sql = "INSERT INTO `remito` (`Id`, `Id_Orden`, `Fecha`) VALUES (NULL, $ordencompra, current_timestamp())";
            }
            else if($tipo==5){ //Inserta el detalle del remito
                //--obtiene el id del remito
                $ordencompra = $_GET["orden"];
                include("configcomprobante/confg.php");//incluye la conexion
                $sql2 = $conexion->prepare("SELECT Id FROM remito WHERE Id_Orden = :idorden ORDER BY Fecha DESC , Id DESC LIMIT 1");
                $sql2->bindParam(':idorden',$ordencompra);
                $sql2->execute();
                $consulta=$sql2->fetch(PDO::FETCH_LAZY);
                $remito=$consulta['Id'];

                //inserta el detalle
                $idproducto = $_GET["id"];
                $cantproducto = $_GET["cant"];
                $sql = "INSERT INTO `remito_detalle` (`Id`, `Id_remito`, `Id_insumo`, `Cantidad`) VALUES (NULL, $remito, $idproducto, $cantproducto)";
            }
            
           
            $resultado=mysqli_query($conexion1,$sql);
            
            $resultados=1;

            echo json_encode($resultados);
        }
        catch (PDOException $e){
            echo "Error ".$e->getMessage();
            //echo 0;
        }


        
?>