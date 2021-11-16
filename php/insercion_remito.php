<?php  



    $conexion = NULL;
        try{
            $conexion = mysqli_connect('localhost','root','','debian2');

            $sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM insumo");
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
                
               
                $sql = "SELECT * FROM insumo where Id like '%$c%' or Id_categoria like '%$c%' or Nombre like '%$c%'
                or Descripcion like '%$c%'LIMIT $desde,$por_pagina 
";

            }
            else{
                $sql = "SELECT * FROM insumo LIMIT $desde,$por_pagina ";
            }


            $resultado=mysqli_query($conexion,$sql);
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);
            echo json_encode($resultados); 
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }