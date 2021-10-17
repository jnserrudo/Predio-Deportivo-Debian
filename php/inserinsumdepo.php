<?php  
    $conexion = NULL;
        try
        {
            $conexion = mysqli_connect('localhost','root','','debian2');

			$sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM deposito_detalle");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];
			$por_pagina = 5;
            
            //---------------------------------------------
            /*$host="localhost";
            $base="debian2";
            $usuario="root";
            $contrasenia="";
            $port=3307;
            try 
            { 
            $conect=new PDO("mysql:host=$host;dbname=$base",$usuario,$contrasenia);
            } 
            catch (Exception $ex) 
            {
                echo $ex->getMessage();//muestra msj si falla la coneccion
            }*/
            //------------------------------


            $iddepo = $_GET['h'];
            /*$SQLdepo = $conect-> prepare ("SELECT d.Id FROM deposito as d where d.Nombre = :nombre");
            $SQLdepo->bindParam(':nombre',$nom);
            $SQLdepo->execute();
            $Iddepo=$SQLdepo->fetch(PDO::FETCH_LAZY);
            $depo=$Iddepo[0];*/
            
            if(empty($_GET['f']))
			{
				$pagina = 1;
			}
            else{
				$pagina = $_GET['f'];
			}

            //$iddeposito = $_GET['t'];

			$desde = ($pagina-1) * $por_pagina;

            if (isset($_GET['x'])) 
            {
                $c = $_GET['x'];

                //<script> console.log("entro aca");</script>
        
                $sql = "SELECT d.Id_insumo,i.Nombre,i.Descripcion,d.stock,i.Stock
                FROM deposito_detalle as d 


                inner JOIN insumo as i on d.Id_insumo = i.Id 
                WHERE d.Id_insumo in 
                (SELECT insumo.Id from insumo where insumo.id like '%$c%' or insumo.Nombre like '%$c%' or insumo.Descripcion like '%$c%' or insumo.stock like '%$c%') 
                and d.Id_deposito = $iddepo
                LIMIT $desde,$por_pagina";

            }
            else
            {
                $sql = "SELECT d.Id_insumo,i.Nombre,i.Descripcion,d.stock,i.Stock
                FROM deposito_detalle as d 
               inner  JOIN insumo as i on d.Id_insumo = i.Id 
                WHERE d.Id_deposito = $iddepo
                LIMIT $desde,$por_pagina";
            }

            $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

            echo json_encode($resultados);
            
        }
        catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }