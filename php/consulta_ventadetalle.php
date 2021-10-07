<?php  


    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

//Paginador
    

                $sql_registe = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM ventas_detalle ");
                $result_register = mysqli_fetch_array($sql_registe);
                $total_registro = $result_register['total_registro'];

                $por_pagina = 5;
                if (empty($_GET['p'])) {
                    $pagina = 1;
                } else {
                    $pagina = $_GET['p'];
                }

                $desde = ($pagina-1) * $por_pagina;

            
                if (isset($_GET['x'])) {
                    $c = $_GET['x'];

                    $sql = "SELECT i.Nombre,d.Cantidad,v.Total,dep.Nombre FROM ventas_detalle as d  inner join insumo as i on d.Id_insumo=i.Id  inner join deposito as dep on d.Id_deposito=dep.Id inner join ventas as v on v.Id=d.Id_venta where d.Id_venta=$c
                             LIMIT $desde,$por_pagina ";
                } 
                $resultado=mysqli_query($conexion, $sql);
            
                $resultados=mysqli_fetch_all($resultado, PDO::FETCH_ASSOC);

                echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }
