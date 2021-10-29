<?php  
    $conexion = NULL;
        //try
        //{
            $idinsumo = $_GET['i'];
            $iddepo = $_GET['d'];
            $cantinsumo = $_GET['c'];

            $conexion = mysqli_connect('localhost','root','','debian2');
			$sql_registe = mysqli_query($conexion,"SELECT COUNT(*) as total_registro FROM deposito_detalle where Id_insumo = $idinsumo and Id_deposito = $iddepo");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

            if($total_registro == 0){
                $sql = "INSERT INTO `deposito_detalle` (`Id_deposito`, `Id_insumo`,`stockmin`, `stock`) VALUES ($iddepo, $idinsumo, $cantinsumo,'0')";
            }
            else{

                $sqlcontar = mysqli_query($conexion,"SELECT `stock` FROM deposito_detalle WHERE Id_insumo = $idinsumo and Id_deposito = $iddepo");
                /*$resultado = mysqli_fetch_arrary($sqlcontar);
                $stock = $resultado[0];*/
                $stock = mysqli_fetch_row($sqlcontar)[0];
                $total = $stock + $cantinsumo;

                $sql = "UPDATE `deposito_detalle` SET `stock` = $total WHERE Id_insumo = $idinsumo and Id_deposito = $iddepo";
            }

            $ejecucion=mysqli_query($conexion,$sql);
            $resultados=mysqli_fetch_all($ejecucion,PDO::FETCH_ASSOC);
            //echo json_encode($resultados);
            
        //}
        //catch (PDOException $e){
            //echo "Error ".$e->getMessage();
        //}