<?php
    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

            if (isset($_GET['q'])) {
                $ins=$_GET['q'];
                // echo $c;
                // if(!$c=""){
                $sql = "SELECT i.Nombre,rd.Cantidad FROM remito_detalle as rd
                inner join insumo as i on  i.Id=rd.Id_insumo
                where rd.Id_remito=$ins";
                // }else{
                //   $sql = "SELECT * FROM insumo";
            }
            


            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }



?>