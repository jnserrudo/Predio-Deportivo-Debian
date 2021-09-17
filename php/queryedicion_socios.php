<?php  
$conexion = NULL;
        

         
          try{
            $conexion = mysqli_connect('localhost','root','','debian2');
            
            if (isset($_POST['t'])) {
                $z = $_POST['t'];
                $GLOBALS['z']=$z;
                // echo $c;
                // if(!$c=""){
               // $sql = "SELECT * FROM proveedor where Id=$z";
               $sql = "SELECT * FROM socio where Id=$z";
                // }else{
                //   $sql = "SELECT * FROM insumo";
                $resultado=mysqli_query($conexion,$sql);
            
            $resultados=mysqli_fetch_array($resultado);
            var_dump($resultados);
            $GLOBALS['res']=$resultados;
            }
            
        }catch (PDOException $e){
            echo "Error ".$e->getMessage();
        }

            
        // function getid(){
        //     echo   $GLOBALS['z'];
        // }
        // function getnom(){
        //     echo $GLOBALS['res']['Nombre'];
        // }
        // function getdesc(){
        //     echo $GLOBALS['res']['Descripcion'];
        // }
        // function getprecio(){
        //     echo $GLOBALS['res']['Precio'];

        // }
        // function getstock(){
        //     echo $GLOBALS['res']['Stock'];
        // }