<?php

$conexion = NULL;
try{

  $conexion = mysqli_connect('localhost','root','','debian2');


  
  if (isset($_GET['fi']) && isset($_GET['ff'])) {
      $ff=$_GET['ff'];
      $fi=$_GET['fi'];

      $sql = "SELECT Fecha,Total FROM ventas
        
        WHERE Fecha BETWEEN '$fi' and '$ff';

        ";
  }
  
    $resultado=mysqli_query($conexion,$sql);
    
    $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

    echo json_encode($resultados);
    
}catch (PDOException $e){
    echo "Error ".$e->getMessage();
}

?>