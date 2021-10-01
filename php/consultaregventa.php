<?php  

    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

        


          $sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM FROM deposito_detalle as dd inner join deposito as d on d.Id=dd.Id_deposito inner join insumo as i on dd.Id_insumo=i.Id");
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
            if (isset($_GET['x'])) {
                $c = $_GET['x'];
                $sql = "SELECT dd.Id,d.Nombre,i.Nombre,dd.stock FROM deposito_detalle as dd inner join  deposito as d on d.Id=dd.Id_deposito inner join insumo as i on dd.Id_insumo=i.Id where dd.Id like '%$c%' or d.Nombre like '%$c%' or i.Nombre like '%$c%' or dd.stock like '%$c%'
                           LIMIT $desde,$por_pagina";

            }
            else{
                $sql = "SELECT dd.Id,d.Nombre,i.Nombre,dd.stock FROM deposito_detalle as dd inner join deposito as d on d.Id=dd.Id_deposito inner join insumo as i on dd.Id_insumo=i.Id  LIMIT $desde,$por_pagina";
            }
          
            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }