<?php

$conexion = NULL;
try{

  $conexion = mysqli_connect('localhost','root','','debian2');


  
  if (isset($_GET['fi']) && isset($_GET['ff'])) {
      $ff=$_GET['ff'];
      $fi=$_GET['fi'];

      $sql = "
      
      SELECT  COALESCE(MONTHNAME(v.Fecha),MONTHNAME(s.fecha_pago)) Fecha,SUM(IFNULL(v.Total,0) + IFNULL(s.monto_pago,0)) as Total FROM ventas as v
      LEFT JOIN socio_cuota_pagos as s
      ON v.Fecha=s.fecha_pago
      GROUP BY COALESCE(MONTHNAME(v.Fecha),MONTHNAME(s.fecha_pago))
      UNION ALL
      SELECT  COALESCE(MONTHNAME(v.Fecha),MONTHNAME(s.fecha_pago)) Fecha,SUM(IFNULL(v.Total,0) + IFNULL(s.monto_pago,0)) as Total FROM ventas as v
      RIGHT JOIN socio_cuota_pagos as s
      ON v.Fecha=s.fecha_pago
      WHERE (v.Fecha BETWEEN '$fi' and '$ff')  or (  s.fecha_pago  BETWEEN '$fi' and '$ff')
      GROUP BY COALESCE(MONTHNAME(v.Fecha),MONTHNAME(s.fecha_pago))
        ";
  }
  
    $resultado=mysqli_query($conexion,$sql);
    
    $resultados=mysqli_fetch_all($resultado,PDO::FETCH_ASSOC);

    echo json_encode($resultados);
    
}catch (PDOException $e){
    echo "Error ".$e->getMessage();
}

?>