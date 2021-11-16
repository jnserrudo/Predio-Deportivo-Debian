
<?php  
  



  $conexion = NULL;
      try{

        $conexion = mysqli_connect('localhost','root','','debian2');
        $sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM remito INNER JOIN remito_detalle on remito_detalle.Id_remito=remito.Id INNER JOIN insumo on remito_detalle.Id_insumo=insumo.Id;");
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

              $sql = "SELECT remito.Id,remito.Id_orden,remito.Fecha,remito_detalle.Id_insumo,insumo.Nombre,remito_detalle.Cantidad FROM remito INNER JOIN remito_detalle on remito_detalle.Id_remito=remito.Id INNER JOIN insumo on remito_detalle.Id_insumo=insumo.Id
              where remito.Id like '%$c%' or remito.Id_orden like '%$c%' or remito.Fecha like '%$c%'
               or remito_detalle.Id_insumo like '%$c%' or remito_detalle.Cantidad like '%$c%' or insumo.Nombre like '%$c%' LIMIT $desde,$por_pagina ";
              

          }
          else{
              $sql = "SELECT remito.Id,remito.Id_orden,remito.Fecha,remito_detalle.Id_insumo,insumo.Nombre,remito_detalle.Cantidad FROM remito INNER JOIN remito_detalle on remito_detalle.Id_remito=remito.Id INNER JOIN insumo on remito_detalle.Id_insumo=insumo.Id LIMIT $desde,$por_pagina;";
          }
        


          $resultado=mysqli_query($conexion,$sql);
          
          $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

          echo json_encode($resultados);
          
      }catch (PDOException $e){
          echo "Error ".$e->getMessage();
      }



