<?php  



    $conexion = NULL;
        try{

          $conexion = mysqli_connect('localhost','root','','debian2');

            if (isset($_GET['x'])) {
                $c = $_GET['x'];
                // echo $c;
                // if(!$c=""){
                $sql = "SELECT * FROM insumo where Id like '%$c%' or Id_categoria like '%$c%' or Nombre like '%$c%'
                or Descripcion like '%$c%'
";
                // }else{
                //   $sql = "SELECT * FROM insumo";
            }
            else{
                $sql = "SELECT * FROM insumo";
            }


            $resultado=mysqli_query($conexion,$sql);
            $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);
            echo json_encode($resultados); 
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }