<?php  
    $conexion = NULL;
        try
        {
			/*$sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM socio");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];*/

            if(empty($_GET['p']))
			{
				$pagina = 1;
			}
            else{
				$pagina = $_GET['p'];
			}

            $por_pagina = 5;
			$desde = ($pagina-1) * $por_pagina;

            if (isset($_GET['x'])) 
            {
                $c = $_GET['x'];
                $sql = "SELECT Id,Apellido,Nombre,DNI from socio as s where s.Estado = 'activo' and s.Id in 
                (select Id from socio as soc where soc.Id like '%$c%' or soc.Nombre like '%$c%' or soc.Apellido like '%$c%' or soc.DNI like '%$c%') LIMIT $desde,$por_pagina ";
            }
            else
            {
                $sql = "SELECT Id,Apellido,Nombre,DNI from socio where Estado = 'activo' LIMIT $desde,$por_pagina"; 
            }
            
            $conexion = mysqli_connect('localhost','root','','debian2');
            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
            /*
            $conexion = mysqli_connect('localhost','root','','debian2');
            $sqldeuda = "INSERT into cuotas values(null,20);"
            $resultado=mysqli_query($conexion,$sqldeuda);
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);
            echo json_encode($resultados);
            */
        }
        catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }