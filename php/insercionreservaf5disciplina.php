<?php  


    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');
//antes de la paginacion
            // if (isset($_GET['x'])) {
            //     $c = $_GET['x'];

            //     $sql = "SELECT * FROM insumo where Id like '%$c%' or Id_categoria like '%$c%' or Nombre like '%$c%'
            //               or Descripcion like '%$c%' or Precio like '%$c%' or Stock like '%$c%'";

            // }
            // else{
            //     if(isset($_GET['p'])){

            //     }else{
            //         $sql = "SELECT * FROM insumo";
            //     }
            // }




//Paginador
			$sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM reservaf5");
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

            $d= $_GET['y'];


            if (isset($_GET['x'])) {

                //if (isset($_GET['tipo'])) {

                    
                  
               $c=$_GET['x'];
                
                $sql = "SELECT * FROM reservaf5 where Fecha like '%$c%' and Disciplina like '%$d%'
                LIMIT $desde,$por_pagina ";

                

            }
            else{
                // $c = $_GET['x'];
                $sql = "SELECT * FROM reservaf5 where Disciplina like '%$d%' LIMIT $desde,$por_pagina ";
       
            }






            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }
    
    catch (PDOException $e){
         echo "Error ".$e->getMessage();
        }
?>


      