<?php  

    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

        


          $sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM ventas as v inner join deposito as d on v.Id_deposito=d.Id");
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
                $sql = "SELECT v.Id,v.Fecha,d.Nombre,v.Total FROM ventas as v inner join deposito as d on v.Id_deposito=d.Id where v.Id like '%$c%' or v.Fecha like '%$c%' or d.Nombre like '%$c%' or v.Total like '%$c%'
                           LIMIT $desde,$por_pagina";

            }
            else{
                $sql = "SELECT v.Id,v.Fecha,d.Nombre,v.Total FROM ventas as v inner join deposito as d on v.Id_deposito=d.Id LIMIT $desde,$por_pagina";
            }
          
            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }