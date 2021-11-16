<?php  
    $conexion = NULL;
        try
        {
            $conexion = mysqli_connect('localhost','root','','debian2');
			$por_pagina = 6;

            if(empty($_GET['p']))
			{
				$pagina = 1;
			}
            else{
				$pagina = $_GET['p'];
			}

			$desde = ($pagina-1) * $por_pagina;


            $sql = "SELECT t.Id_producto, i.Nombre, t.Cantidad FROM temporal as t JOIN insumo as i on i.Id = t.Id_producto LIMIT $desde,$por_pagina"; 

            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }
        catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }