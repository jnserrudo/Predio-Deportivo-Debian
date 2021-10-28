<?php  
    $conexion = NULL;
        try
        {
            $conexion = mysqli_connect('localhost','root','','debian2');

			$sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM insumo");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];
			$por_pagina = 5;
            $depo=$_GET['depo'];

            if(empty($_GET['p']))
			{
				$pagina = 1;
			}
            else{
				$pagina = $_GET['p'];
			}

			$desde = ($pagina-1) * $por_pagina;

            if (isset($_GET['z'])) 
            {
                $c = $_GET['z'];
                //$sql = "SELECT Id,Nombre,Descripcion,Stock FROM insumo where  Id like '%$c%' or Nombre like '%$c%' or Descripcion like '%$c%' LIMIT $desde,$por_pagina ";
                
        $sql = "SELECT i.Id,i.Nombre,i.Descripcion,i.Stock FROM insumoxdeposito as insd inner join insumo as i on i.Id=insd.Id_insumo inner join deposito as d on d.Id=insd.id_deposito  where d.Nombre='$depo' and ( i.Id like '%$c%' or i.Nombre like '%$c%' or i.Descripcion like '%$c%') LIMIT $desde,$por_pagina ";
            
            }
            else
            {
                $sql = "SELECT Id,Nombre,Descripcion,Stock FROM insumo LIMIT $desde,$por_pagina"; 
            }

            $resultado=mysqli_query($conexion,$sql);
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);
            echo json_encode($resultados);
            
        }
        catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }