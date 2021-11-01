<?php  


    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

//Paginador
			$sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM comprobante as c inner join proveedor as p on p.Id=c.Id_proveedor where c.tipo='Factura'");
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

			// $query = mysqli_query($conection,"SELECT u.idusuario, u.nombre, u.correo, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE estatus = 1 ORDER BY u.idusuario ASC LIMIT $desde,$por_pagina 
			// 	");



            if (isset($_GET['pr'])) {
                $c = $_GET['pr'];
                // echo $c;
                // if(!$c=""){
                $sql = "SELECT c.Id,p.Nombre,c.Fecha,c.Estado,c.Monto,c.Letra,c.Id_orden_compra,c.Tipo,c.Nro_Factura,c.Fecha_Factura FROM comprobante as c inner join proveedor as p on p.Id=c.Id_proveedor 
                where c.Id_proveedor=$c and c.Id not in(select Id_comprobante from ordenpago_detalle) and c.tipo='Factura'
                LIMIT $desde,$por_pagina ";
                // }else{
                //   $sql = "SELECT * FROM insumo";
            }
            else{
                if (isset($_GET['x'])) {
                    $c = $_GET['x'];

                    $sql = "SELECT c.Id,p.Nombre,c.Fecha,c.Estado,c.Monto,c.Letra,c.Id_orden_compra,c.Tipo,c.Nro_Factura,c.Fecha_Factura FROM comprobante as c inner join proveedor as p on p.Id=c.Id_proveedor
                     where c.Id not in(select Id_comprobante from ordenpago_detalle) and c.tipo='Factura' and(
                     c.Id like '%$c%' or p.Nombre like '%$c%'  
                          or c.Fecha like '%$c%' or c.Estado like '%$c%' or c.Monto like '%$c%' or c.Letra like '%$c%'or
                           c.Id_orden_compra like '%$c%'or c.Tipo like '%$c%') 
                          LIMIT $desde,$por_pagina ";
                } else {
                    $sql = "SELECT c.Id,p.Nombre,c.Fecha,c.Estado,c.Monto,c.Letra,c.Id_orden_compra,c.Tipo,c.Nro_Factura,c.Fecha_Factura FROM comprobante as c inner join proveedor as p on p.Id=c.Id_proveedor and c.Id not in(select Id_comprobante from ordenpago_detalle)  and c.tipo='Factura'  LIMIT $desde,$por_pagina";
                }
            }





            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }