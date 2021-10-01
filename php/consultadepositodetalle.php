<?php  


    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

//Paginador
            

                $sql_registe = mysqli_query($conexion, "SELECT COUNT(*) as total_registro FROM deposito_detalle as dd inner join insumo as i on dd.Id_insumo=i.Id ");
                $result_register = mysqli_fetch_array($sql_registe);
                $total_registro = $result_register['total_registro'];

                $por_pagina = 5;
                if (empty($_GET['p'])) {
                    $pagina = 1;
                } else {
                    $pagina = $_GET['p'];
                }

                $desde = ($pagina-1) * $por_pagina;

                // $query = mysqli_query($conection,"SELECT u.idusuario, u.nombre, u.correo, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE estatus = 1 ORDER BY u.idusuario ASC LIMIT $desde,$por_pagina
                // 	");


                if (isset($_GET['x'])) {
                    $c = $_GET['x'];

                    $sql = "SELECT i.Id,i.Nombre,i.Descripcion,i.Precio,dd.stock  FROM deposito_detalle as dd inner join insumo as i on dd.Id_insumo=i.Id where dd.Id_deposito=$c LIMIT $desde,$por_pagina ";
                } 
                $resultado=mysqli_query($conexion, $sql);
            
                $resultados=mysqli_fetch_all($resultado, PDO::FETCH_ASSOC);

                echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }
        