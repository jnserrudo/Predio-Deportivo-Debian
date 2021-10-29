<?php  
    $conexion = NULL;
        try
        {
            $idsocio = $_GET['h'];

            $conexion = mysqli_connect('localhost','root','','debian2');
			/*$sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM socio");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];*/
			$por_pagina = 4;

            if(empty($_GET['p']))
			{
				$pagina = 1;
			}
            else{
				$pagina = $_GET['p'];
			}

			$desde = ($pagina-1) * $por_pagina;

            if (isset($_GET['x'])) 
            {
                $c = $_GET['x'];
                $sql = "SELECT Id,Mes,Anio,Saldocuota from socio_cuota as sc where Id_socio = $idsocio and Saldocuota > 0 and sc.Id in 
                (select Id from socio_cuota as soc where soc.Id like '%$c%' or soc.Mes like '%$c%' or soc.Anio like '%$c%' or soc.Saldocuota like '%$c%') LIMIT $desde,$por_pagina ";
            }
            else
            {
                $sql = "SELECT Id,Mes,Anio,Saldocuota from socio_cuota where Id_socio = $idsocio and Saldocuota > 0 LIMIT $desde,$por_pagina"; 
            }

            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }
        catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }