

<?php
    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

          $sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM orden as o inner join proveedor as p on o.Id_proveedor=p.Id");
          $result_register = mysqli_fetch_array($sql_registe);
          $total_registro = $result_register['total_registro'];

          $por_pagina = 5;
          if(empty($_GET['p']))
          {
              $pagina = 1;
          }else{
              $pagina = $_GET['p'];
          }

          $desde = ($pagina-1) * $por_pagina;



          if (isset($_GET['pr'])) {
            $c = $_GET['pr'];
            // echo $c;
            // if(!$c=""){
            $sql = "SELECT o.Id,o.Fecha,p.Nombre FROM orden as o inner join proveedor as p on o.Id_proveedor=p.Id 
            where o.Id_proveedor='$c' and o.Id not in (SELECT Id_orden_compra from comprobante)
            
             LIMIT $desde,$por_pagina";
            // }else{
            //   $sql = "SELECT * FROM insumo";
        }
        else{
             
            if (isset($_GET['x'])) {
                $c = $_GET['x'];
                // echo $c;
                // if(!$c=""){
                $sql = "SELECT o.Id,o.Fecha,p.Nombre FROM orden as o inner join proveedor as p on o.Id_proveedor=p.Id 
                where o.Id not in (SELECT Id_orden_compra from comprobante) and( o.Id like '%$c%' or o.Fecha like '%$c%' or p.Nombre like '%$c%') 
                LIMIT $desde,$por_pagina";
            
             } else {
                 
                $sql = "SELECT o.Id,o.Fecha,p.Nombre FROM orden as o inner join proveedor as p on o.Id_proveedor=p.Id where o.Id not in (SELECT Id_orden_compra from comprobante) LIMIT $desde,$por_pagina";
             }  // POR SI HAY PROBLEMAS, SE COMENTO ESTE ELSE
        }
          


            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }
